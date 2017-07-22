<?php
return array(

//↓↓↓↓↓↓↓↓↓↓↓数据库配置资料

    'DB_TYPE'			=>	'mysql',
    'DB_HOST'			=>	'192.168.8.102',
    'DB_NAME'			=>	'lhc',//需要新建一个数据库！名字叫
    'DB_USER'			=>	'root',		//数据库用户名
    'DB_PWD'			=>	'root',//数据库登录密码
    'DB_PORT'			=>	'3306',
    'DB_PREFIX'		    =>	'cz_',//数据库表名前缀
    'DB_PARAMS'         =>  array(), // 数据库连接参数
//'DB_DEBUG'  		=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'   =>  true,        // 启用字段缓存
    'DB_CHARSET'        =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'    =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'    =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'     =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'       =>  '', // 指定从服务器序号

//↑↑↑↑↑↑↑↑↑↑↑↑数据库配置资料



    //		'URL_MODEL'       =>2,// URL访问模式,可选参数0、1、2、3       已分离！ Index\Home\Conf   和   Admin\Home\Conf


//'SHOW_PAGE_TRACE' =>true,//让页面显示追踪日志信息
//'SHOW_RUN_TIME' =>true,   //显示运行时间
//'SHOW_ADV_TIME' =>true,   //显示详细的运行时间
//'SHOW_DB_TIMES'=>true,//显示数据库操作次数
//'SHOW_CACHE_TIMES'=>true,//显示缓存操作次数
//'SHOW_USE_MEM'=>true,//显示内存开销

    /*
     * 返回参数类型，用于判断返回值
     */
    'CUE_0'=>0,
    'CUE_1'=>1,
    'CUE_2'=>2,
    'CUE_3'=>3,

    'DB_FIELD_CACHE'=>false,
    'HTML_CACHE_ON'=>false,

    'AUTH_CONFIG' => array(
        'AUTH_ON' => true, //是否开启权限
        'AUTH_TYPE' => 1, //
        'AUTH_GROUP' => 'cz_auth_group', //用户组
        'AUTH_GROUP_ACCESS' => 'cz_auth_group_access', //用户组规则
        'AUTH_RULE' => 'cz_auth_rule', //规则中间表
        'AUTH_USER' => 'cz_admin'// 管理员表
    ),

    /* 自动运行配置 */
    'CRON_CONFIG_ON' => true, // 是否开启自动运行
    'CRON_CONFIG' => array(
        '采集开奖' => array('Home/Caiji/kjcj', '18000', ''), //路径(格式同R)、间隔秒（0为一直运行）、指定一个开始时间
        '心水资料' => array('Home/Caiji/zxcj1', '14400', ''), //路径(格式同R)、间隔秒（0为一直运行）、指定一个开始时间
        '心水资料' => array('Home/Caiji/zxcj2', '18400', ''), //路径(格式同R)、间隔秒（0为一直运行）、指定一个开始时间
        '心水资料' => array('Home/Caiji/zxcj3', '18000', ''), //路径(格式同R)、间隔秒（0为一直运行）、指定一个开始时间
        '心水资料' => array('Home/Caiji/zxcj4', '18400', ''), //路径(格式同R)、间隔秒（0为一直运行）、指定一个开始时间
        '心水资料' => array('Home/Caiji/zxcj6', '23400', ''), //路径(格式同R)、间隔秒（0为一直运行）、指定一个开始时间
        '心水资料' => array('Home/Caiji/zxcj9', '23400', ''), //路径(格式同R)、间隔秒（0为一直运行）、指定一个开始时间
        '图库采集' => array('Home/Caiji/tkcj', '25400', ''), //路径(格式同R)、间隔秒（0为一直运行）、指定一个开始时间

    ),

    'TOKEN_ON'      =>    false,  // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true

    'DEFAULT_FILTER'        =>  'strip_tags,stripslashes',//使用函数过滤
// 布局设置
    'TMPL_ENGINE_TYPE'      =>  'Think',     // 默认模板引擎 以下设置仅对使用Think模板引擎有
    'LOAD_EXT_FILE'=>'Common',　　//项目中的conf.php
);
/**
 * 将U函数生成的链接转换为路由链接
 * @param string $url U函数生成的链接
 */


function RU($url){

    // 兼容 category/:cid\d 路由
    if(preg_match('/\/Home\/Index\/category\/cid\/\d+/', $url)){
        $url=str_replace(array('/Home/Index','/cid'), '', $url);
    }
    // 兼容 tag/:tid\d 路由
    if(preg_match('/\/Home\/Index\/tag\/tid\/\d+/', $url)) {
        $url=str_replace(array('/Home/Index','/tid'), '', $url);
    }
    // 兼容article/cid/:cid\d/:aid\d
    if(preg_match('/\/Home\/Index\/article\/cid\/\d+\/aid\/\d+/', $url)){
        $url=str_replace(array('/Home/Index','/aid'), '', $url);
    }

    // 兼容 article/sw/:search_word\S/:aid\d
    if(preg_match('/\/Home\/Article\/lists\/id\/\d+/', $url)){
        $url=str_replace(array('/Home','/id'), '', $url);
    }
    // 兼容 article/:aid\d=>Index/article
    if(preg_match('/\/Home\/(.*)\/detail\/id\/\d+/', $url)){
        $url=str_replace(array('/Home','/id'), '', $url);
        $url=str_replace('/detail', '', $url);
    }
    // 兼容 index/:p\d=>'Index/index
    if(preg_match('/\/Home/', $url)){
        $url=str_replace('/Home', '', $url);
    }
    return $url;
    //return $url;
}

?>