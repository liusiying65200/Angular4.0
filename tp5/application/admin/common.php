<?php
//2017,3,15.王维.
/**
 * 定义网站公共地址
 */
function base_url(){
    return 'http://'.$_SERVER['HTTP_HOST'];

}
/**
 * 定义返回上一页
 * @param
 * @return
 */
function back(){
    return $_SERVER['HTTP_REFERER'];
}
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
/**
 * 把数组(必须是二级数组)变成(a,b,c)的形式
 * @param $array $id 变量
 * @return string
 */
function to_sql($array,$id){
    if(is_array($array)){
        $string="(";
        foreach ($array as $arr){
            $string.=$arr[$id].',';
        }
        $sql=substr($string, 0,strlen($string)-1).')';
        return $sql;
    }
}
/**
 * 把数组变成xml形式
 * @param $result 变量
 * @return xml
 */
function ToXml($result){
    $xml = "<xml>";
    foreach ($result as $key=>$val){
        if (is_numeric($val)){
            $xml.="<".$key.">".$val."</".$key.">";
        }else{
            $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
        }
    }
    $xml.="</xml>";
    return $xml;
}
/**
 * 将XML转为array
 * @param $xml 变量
 * @return json
 */
function FromXml($xml){
    //将XML转为array
    //禁止引用外部xml实体
    libxml_disable_entity_loader(true);
    $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    return $values;
}
/**
 * php post请求数据
 * @param $url 地址
 * @param $header=0 请求头部默认为0
 * @param $timeout=60 请求超过时间
 * @return string
 */
function curl_get($url,$header=0,$timeout=60){
    $ch = curl_init();
    // 2. 设置选项，包括URL
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,$header);
    curl_setopt($ch, CURLOPT_TIMEOUT,(int)$timeout);

    // 3. 执行并获取HTML文档内容
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
    //return json_decode($output,true);
}
/**
 * php post请求数据
 * @param $url 地址
 * @param $data post数据
 * @param $timeout=60 请求超过时间
 * @return string
 */
function curl_post($url,$data,$timeout=60){
    $ch = curl_init();
    // 2. 设置选项，包括URL
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,(int)$timeout);
    // post数据
    curl_setopt($ch, CURLOPT_POST, TRUE);
    // post的变量
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    // 3. 执行并获取HTML文档内容
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
    //return json_decode($output,true);
}
/**
 * php xml请求数据
 * @param $url 地址
 * @param $xml xml数据
 * @param $timeout=60 请求超过时间
 * @return string
 */
function curl_post_xml($url,$xml,$timeout=60){
    // 1. 初始化
    $ch = curl_init();
    // 2. 设置选项，包括URL
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//严格校验
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_TIMEOUT, (int)$timeout);
    // 3. 执行并获取HTML文档内容
    $output = curl_exec($ch);
    if($output === FALSE ){
        echo "CURL Error:".curl_error($ch);
    }
    // 4. 释放curl句柄
    curl_close($ch);
    return $output;
}
/**
 * 处理textarea
 * @param $string 变量
 * @return string
 */
function clear_string($string){
    $string=str_replace("\n","<br>",$string);
    $string=str_replace("\r", "",$string);
    $string=str_replace("\t", "",$string);
    $string=str_replace(" ", "",$string);
    return $string;
}
/**
 * 对数组通过关联id进行分类
 * @param $arr     array  要分类的数组
 * @param $parent_id=0    string  父id
 * @return array    返回多维数组
 */
function list_to_tree($arr,$parent_id=0){
    $treeArray = array();
    foreach ($arr as $v){
        if ($v['parent_id'] == $parent_id){
            $v['child']=list_to_tree($arr,$v['id']);
            $treeArray[] = $v;
        }
    }
    return $treeArray;
}
/**
 * 对数据的无限极分类，查找家谱树
 * @param $arr     array  要分类的数组
 * @param $parent_id   string  父id
 * @return array    返回多维数组
 */
function getFamilyTree($arr,$parent_id){
    static $list = array();
    foreach ($arr as $v){
        if ($v['id'] == $parent_id){
            $list[] = $v;
            getFamilyTree($arr,$v['parent_id']);
        }
    }
    return $list;
}
