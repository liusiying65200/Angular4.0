<?php
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
