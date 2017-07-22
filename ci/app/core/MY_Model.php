<?php
class MY_Model extends CI_Model{

    public $table;
    protected $rule=[];//验证规则
    protected $message=[];//消息提示
    protected $extend=[];//验证规则扩展
    protected $scene=[];//验证场景

    public function __construct()
    {
        parent::__construct();
        //加载db
        $this->load->database();
    }


    /**
     * 得到多条数据
     * @param string $field
     * @param array $tj_arr
     * @param array $condition
     * @return mixed
     */
    public function get_all($field = '*', $tj_arr = array(), $condition = array())
    {
        $tj1 = array();
        $tj_arr=$tj_arr?$tj_arr:array();
        foreach ($tj_arr as $k => $v) {
            if (isset($v) && !empty($v)) {
                $tj1[$k] = $v;
            }
        }
        $this->db->from($this->table.' as a');
        $this->db->select($field);
        if (array_key_exists('join', $condition)) {
            if(is_array($condition['join'])){
                foreach ($condition['join'] as $joinData) {
                    $this->db->join($joinData['table'], $joinData['on'], 'left');
                }
            }
            else{
                $this->db->join($condition['join'].' as b', $condition['on'], 'left');
            }
        }
        if (array_key_exists('limit', $condition)) {
            $this->db->limit($condition['limit']);
        }
        if (array_key_exists('page_limit', $condition)) {
            $this->db->limit($condition['page_limit'][1], $condition['page_limit'][0]);
        }
        if (array_key_exists('wherein', $condition)) {
            foreach ($condition['wherein'] as $k => $v) {
                $this->db->where_in($k, $v);
            }
        }
        if (array_key_exists('orwhere', $condition)) {
            foreach ($condition['orwhere'] as $k => $v) {
                $this->db->or_where($k, $v);
            }
        }
        if (array_key_exists('like', $condition)) {
            foreach ($condition['like'] as $k => $v) {
                if (!empty($v)) {
                    $this->db->like($k, $v);
                }
            }
        }
        if (array_key_exists('orlike', $condition)) {
            foreach ($condition['orlike'] as $k => $v) {
                if (!empty($v)) {
                    $this->db->or_like($k, $v);
                }
            }
        }
        if (array_key_exists('notlike', $condition)) {
            foreach ($condition['nolike'] as $k => $v) {
                if (!empty($v)) {
                    $this->db->not_like($k, $v);
                }
            }
        }
        if (array_key_exists('orderby', $condition)) {
            foreach ($condition['orderby'] as $k => $v) {
                $this->db->order_by($k, $v);
            }
        }
        if (array_key_exists('groupby', $condition)) {
            foreach ($condition['groupby'] as $k => $v) {
                $this->db->group_by($v);
            }
        }
        if (array_key_exists('orwhere', $condition)) {
            foreach ($condition['orwhere'] as $k => $v) {
                $this->db->or_where($k, $v);
            }
        }
        if (array_key_exists('wheresql', $condition)) {
            foreach ($condition['wheresql'] as $v) {
                $this->db->where($v);
            }
        }
        if ($tj1 == array()) {
            $query = $this->db->get();
        } else {
            $query = $this->db->get_where('', $tj1);
        }
        $rows = $query->result_array();
        return $rows;
    }

    /**
     * @param string $field
     * @param array $tj_arr
     * @param array $condition
     * @return array
     */
    public function get_one($field = '*', $tj_arr = array(), $condition = array())
    {
        $this->db->select($field);
        if (array_key_exists('orderby', $condition)) {
            foreach ($condition['orderby'] as $k => $v) {
                $this->db->order_by($k, $v);
            }
        }
        if (array_key_exists('join', $condition)) {
            if(is_array($condition['join'])){
                foreach ($condition['join'] as $joinData) {
                    $this->db->join($joinData['table'], $joinData['on'], 'left');
                }
            }
            else{
                $this->db->join($condition['join'].' as b', $condition['on'], 'left');
            }
        }
        if (array_key_exists('wherein', $tj_arr)) {
            foreach ($tj_arr['wherein'] as $k => $v) {
                if ($v != '') {
                    $this->db->where_in($k, $v);
                }
            }
            unset($tj_arr['wherein']);
        }
        $this->db->limit(1);
        $query = $this->db->get_where($this->table, $tj_arr);
        if ($row = $query->row_array()) {
            return $row;
        }
        return array();
    }

    //得到总数
    public function count(){
        $res=$this->db->get($this->table);
        return $res->num_rows();
    }

    //添加
    public function add($data){
        return $this->db->insert($this->table,$data);
    }

    //更新
    public function update($data,$where){
        if($where){
            $this->db->where($where);
        }
        $this->db->update($this->table,$data);
        return $this->db->affected_rows() > 0?true:false;
    }

    /**
     * 删除
     * @param array $ids
     * @return bool
     */
    public function delete($ids = array())
    {
        if (empty($ids)) {
            exit('ERROR:where is null');
        }
        $this->db->where_in('id',$ids);
        $this->db->delete($this->table);
        return $this->db->affected_rows() > 0?true:false;

    }

    /**
     * 数据验证
     * @param string $data 数据
     * @param string $sceneName 场景名 'edit'
     * @return bool
     */
    public function check($data = '', $sceneName = '')
    {
        $CI =& get_instance();
        $CI->load->library('validate');
        if (!$data) {
            $data = get();
        }
        //规则
        $rule = $this->rule ? $this->rule : [];
        //提示消息
        $message = $this->message ? $this->message : [];
        //验证扩展
        if ($this->extend) {
            foreach ($this->extend as $type => $callback) {
                if(method_exists($this,$callback)){
                    $CI->validate->extend([$type=>[$this,$callback]]);
                }
            }
        }
        //验证
        $CI->validate->rule($rule, $message);
        if(!empty($sceneName)&&isset($this->scene[$sceneName])){
            //场景验证
            $CI->validate->scene($sceneName, $this->scene[$sceneName]);
            $result = $CI->validate->scene($sceneName)->check($data);
        }else{
            $result = $CI->validate->check($data);
        }
        if ($result) {
            //返回自动创建、完成后的数据
            return method_exists($this,'handle')?$this->handle($data):$data;
        } else {
            $this->getError = $CI->validate->getError();
            return false;
        }
    }
}