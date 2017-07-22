<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/7/9
 * Time: 上午2:00
 */
if (!function_exists('token_encrypt')) {
    /**
     * 加密
     * @param string $token 需要被加密的数据
     * @param string $private_key 密钥
     * @return string
     */
    function token_encrypt($token='',$private_key='')
    {
        return base64_encode(openssl_encrypt($token, 'BF-CBC', md5($private_key), null, substr(md5($private_key), 0, 8)));
        //return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($private_key), $token, MCRYPT_MODE_CBC, md5(md5($private_key))));
    }
}

if (!function_exists('token_decrypt')) {
    /**
     * 解密
     * @param string $en_token 加密数据
     * @param string $private_key 密钥
     * @return string
     */
    function token_decrypt($en_token='',$private_key='')
    {
        return rtrim(openssl_decrypt(base64_decode($en_token), 'BF-CBC', md5($private_key), 0, substr(md5($private_key), 0, 8)));
        //return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($private_key), base64_decode($en_token), MCRYPT_MODE_CBC, md5(md5($private_key))), "\0");
    }
}