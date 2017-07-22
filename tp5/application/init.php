<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/7/16
 * Time: 下午3:35
 */
define('REQUEST_METHOD',$_SERVER['REQUEST_METHOD']);
define('IS_GET',        REQUEST_METHOD =='GET' ? true : false);
define('IS_POST',       REQUEST_METHOD =='POST' ? true : false);
define('IS_AJAX',       ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || !empty($_POST['ajax']) || !empty($_GET['ajax'])) ? true : false);

defined('SOCKET_SERVER') OR define('SOCKET_SERVER','127.0.0.1');
defined('SOCKET_PORT') OR define('SOCKET_PORT',1883);
defined('MQ_HOST') OR define('MQ_HOST','127.0.0.1');
defined('MQ_PORT') OR define('MQ_PORT','61614');

//redis缓存相关参数
const MUST_LOGIN_TIME_INTERVAL=30*24*3600;//规定多长时间必须登陆一次
const MAX_LIFE_TIME=10*24*3600;//token有效期
const MAX_OFF_TIME=15*60;//最大离线时间
const MAX_ERROR_TIMES=8;//密码输入最大错误次数
/*密钥*/
const TOKEN_PRIVATE_ADMIN_KEY = 123456;// 管理员token密钥
const TOKEN_PRIVATE_USER_KEY = 234567;// 会员token密钥

const TOKEN_CODE_AUTH = 'AuthToken';//后台
const TOKEN_CODE_ADMIN = 'Admin';//管理员
const TOKEN_CODE_USER = 'User';//会员

