<?php
//2017.7.1
function base_url(){
    return 'http://'.$_SERVER['HTTP_HOST'].'/';
}
//接受get数据
function get($index=null){
    return get_instance()->input->get($index);
}
//接受post数据
function post($index=null){
    return get_instance()->input->post($index);
}
/**
 * 加载语言包
 * @param $files
 * @param string $lang 默认为'english'
 * @return array
 */
function lang($files,$lang=''){
    get_instance()->lang->load($files, $lang);
    return get_instance()->lang->language;
}
//占用内存,仅供调试用
function m(){
    return (memory_get_usage()/1024/1024).'M';
}

/**
 * 返回json给客户端；
 * @param $msg  消息提示
 * @param $data=array() 数据
 * @param $code=0 状态
 */
function return_json($msg,$data=[],$code=0){
    $result['msg']=$msg;
    $result['data']=$data;
    $result['code']=$code;
    $callback = isset($_GET['callback']) ? trim($_GET['callback']) : '';
    if(!empty($callback)){
        exit($callback.'('.json_encode($result).')');
    }
    else{
        header("Content-Type:application/json;charset=utf-8");
        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }
}
//得到带token的请求头
function get_auth_headers($header_key = null)
{
    if (function_exists('apache_request_headers')) {
        /* Authorization: header */
        $headers = apache_request_headers();
        $out = array();
        foreach ($headers AS $key => $value) {
            $key = str_replace(" ", "-", ucwords(strtolower(str_replace("-", " ", $key))));
            $out[$key] = $value;
        }
    } else {
        $out = array();
        if (isset($_SERVER['CONTENT_TYPE'])) {
            $out['Content-Type'] = $_SERVER['CONTENT_TYPE'];
        }
        if (isset($_ENV['CONTENT_TYPE'])) {
            $out['Content-Type'] = $_ENV['CONTENT_TYPE'];
        }
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) == "HTTP_") {
                $key = str_replace(" ", "-", ucwords(strtolower(str_replace("_", " ", substr($key, 5)))));
                $out[$key] = $value;
            }
        }
    }
    if ($header_key != null) {
        $header_key = ucfirst(strtolower($header_key));
        if (isset($out[$header_key])) {
            return $out[$header_key];
        } else {
            return false;
        }
    }
    return $out;
}
/**
 * 获取客户端IP
 * @return string
 */
function get_ip()
{
    $realip = '';
    $unknown = 'unknown';
    if (isset($_SERVER)){
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach($arr as $ip){
                $ip = trim($ip);
                if ($ip != 'unknown'){
                    $realip = $ip;
                    break;
                }
            }
        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){
            $realip = $_SERVER['REMOTE_ADDR'];
        }else{
            $realip = $unknown;
        }
    }else{
        if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){
            $realip = getenv("HTTP_CLIENT_IP");
        }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){
            $realip = getenv("REMOTE_ADDR");
        }else{
            $realip = $unknown;
        }
    }
    if($realip=='::1'){
        $realip = '127.0.0.1';
    }
    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
    return $realip;
}
/**
 * 浏览器友好的变量输出
 * @param mixed $var 变量
 * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
 * @param string $label 标签 默认为空
 * @param boolean $strict 是否严谨 默认为true
 * @return void|string
 */
function dump($var, $echo=true, $label=null, $strict=true) {
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo($output);
        return null;
    }else
        return $output;
}