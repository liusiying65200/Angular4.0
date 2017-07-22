<?php
/**
 * redis封装类
 * create: ww
 * Date: 2017/7/7
 * Time: 下午6:30
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Redis Caching Class
 *
 * @package	   CodeIgniter
 * @subpackage Libraries
 * @category   Core
 * @author	   Anton Lindqvist <anton@qvister.se>
 * @link
 */
class MY_Redis
{
    /**
     * Default config
     *
     * @static
     * @var	array
     */
    protected static $_default_config = array(
        'socket_type' => 'tcp',
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => 6379,
        'timeout' => 0
    );

    /**
     * Redis connection
     *
     * @var	Redis
     */
    protected $_redis;

    /**
     * An internal cache for storing keys of serialized values.
     *
     * @var	array
     */
    protected $_serialized = array();

    // ------------------------------------------------------------------------

    /**
     * Class constructor
     *
     * Setup Redis
     *
     * Loads Redis config file if present. Will halt execution
     * if a Redis connection can't be established.
     *
     * @return	void
     * @see		Redis::connect()
     */
    public function __construct()
    {
        if ( ! $this->is_supported())
        {
            log_message('error', '未发现redis扩展');
            return;
        }

        $CI =& get_instance();

        if ($CI->config->load('redis', TRUE, TRUE))
        {
            $config = array_merge(self::$_default_config, $CI->config->item('redis'));
        }
        else
        {
            $config = self::$_default_config;
        }

        $this->_redis = new Redis();

        try
        {
            if ($config['socket_type'] === 'unix')
            {
                $success = $this->_redis->connect($config['socket']);
            }
            else // tcp socket
            {
                $success = $this->_redis->connect($config['host'], $config['port'], $config['timeout']);
            }

            if ( ! $success)
            {
                log_message('error', '无法连接到redis服务器,请检查配置');
            }

            if (isset($config['password']) && ! $this->_redis->auth($config['password']))
            {
                log_message('error', 'redis连接身份认证失败');
            }
        }
        catch (RedisException $e)
        {
            log_message('error', 'redis服务器连接异常('.$e->getMessage().')');
        }

        // Initialize the login of serialized values.
        $serialized = $this->_redis->sMembers('_ci_redis_serialized');
        empty($serialized) OR $this->_serialized = array_flip($serialized);
    }

    // ------------------------------------------------------------------------

    /**
     * Get cache
     *
     * @param	string	$key	Cache ID
     * @return	mixed
     */
    public function get($key)
    {
        $value = $this->_redis->get($key);

        if ($value !== FALSE && isset($this->_serialized[$key]))
        {
            return unserialize($value);
        }

        return $value;
    }

    // ------------------------------------------------------------------------

    /**
     * Save cache
     *
     * @param	string	$id	Cache ID
     * @param	mixed	$data	Data to save
     * @param	int	$ttl	Time to live in seconds
     * @return	bool	TRUE on success, FALSE on failure
     */
    public function set($id, $data, $ttl = 0)
    {
        if (is_array($data) OR is_object($data))
        {
            if ( ! $this->_redis->sIsMember('_ci_redis_serialized', $id) && ! $this->_redis->sAdd('_ci_redis_serialized', $id))
            {
                return FALSE;
            }

            isset($this->_serialized[$id]) OR $this->_serialized[$id] = TRUE;
            $data = serialize($data);
        }
        elseif (isset($this->_serialized[$id]))
        {
            $this->_serialized[$id] = NULL;
            $this->_redis->sRemove('_ci_redis_serialized', $id);
        }

        if($ttl){
            return $this->_redis->setex($id,$ttl,$data);
        }else{
            return $this->_redis->set($id, $data);
        }

    }

    /**
     * 得到所有符合条件redis缓存值
     * @param $keys='*'
     * @return array
     */
    public function get_all($keys='*'){
        $list=[];
        foreach($this->_redis->keys($keys) as $key){
            if($key!='_ci_redis_serialized'){
                $list[$key]=$this->get($key);
            }
        }
        return $list;
    }

    /**
     * 删除所有符合条件的值
     * @param string $keys='*'
     * @return bool
     */
    public function del_all($keys='*'){
        foreach ($this->_redis->keys($keys) as $key){
            $this->del($key);
        }
        return $this->get_all($keys)?false:true;
    }

    // ------------------------------------------------------------------------

    /**
     * Delete from cache
     *
     * @param	string	$key	Cache key
     * @return	bool
     */
    public function del($key)
    {
        if ($this->_redis->delete($key) !== 1)
        {
            return FALSE;
        }

        if (isset($this->_serialized[$key]))
        {
            $this->_serialized[$key] = NULL;
            $this->_redis->sRemove('_ci_redis_serialized', $key);
        }

        return TRUE;
    }

    // ------------------------------------------------------------------------

    /**
     * Increment a raw value
     *
     * @param	string	$id	Cache ID
     * @param	int	$offset	Step/value to add
     * @return	mixed	New value on success or FALSE on failure
     */
    public function increment($id, $offset = 1)
    {
        return $this->_redis->incr($id, $offset);
    }

    // ------------------------------------------------------------------------

    /**
     * Decrement a raw value
     *
     * @param	string	$id	Cache ID
     * @param	int	$offset	Step/value to reduce by
     * @return	mixed	New value on success or FALSE on failure
     */
    public function decrement($id, $offset = 1)
    {
        return $this->_redis->decr($id, $offset);
    }

    // ------------------------------------------------------------------------

    /**
     * Clean cache
     *
     * @return	bool
     * @see		Redis::flushDB()
     */
    public function clean()
    {
        return $this->_redis->flushDB();
    }

    // ------------------------------------------------------------------------

    /**
     * Get cache driver info
     *
     * @param	string	$type	Not supported in Redis.
     *				Only included in order to offer a
     *				consistent cache API.
     * @return	array
     * @see		Redis::info()
     */
    public function cache_info($type = NULL)
    {
        return $this->_redis->info();
    }

    // ------------------------------------------------------------------------

    /**
     * Get cache metadata
     *
     * @param	string	$key	Cache key
     * @return	array
     */
    public function get_metadata($key)
    {
        $value = $this->get($key);

        if ($value !== FALSE)
        {
            return array(
                'expire' => time() + $this->_redis->ttl($key),
                'data' => $value
            );
        }

        return FALSE;
    }

    // ------------------------------------------------------------------------

    /**
     * Check if Redis driver is supported
     *
     * @return	bool
     */
    public function is_supported()
    {
        return extension_loaded('redis');
    }

    // ------------------------------------------------------------------------

    /**
     * Class destructor
     *
     * Closes the connection to Redis if present.
     *
     * @return	void
     */
    public function __destruct()
    {
        if ($this->_redis)
        {
            $this->_redis->close();
        }
    }

    /**
     *
     * 通过__call直接从原始redis类里获取方法
     * @param $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments=[])
    {
        return call_user_func_array([$this->_redis,$name],$arguments);
    }


}
