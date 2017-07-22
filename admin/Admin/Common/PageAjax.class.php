<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Common;

class PageAjax{
    public $firstRow; // 起始行数
    public $listRows; // 列表每页显示行数
    public $totalRows; // 总行数
    public $totalPages; // 分页总页面数
    public $rollPage   = 8;// 分页栏每页显示的页数
    public $lastSuffix = false; // 最后一页是否显示总页数
    public $clickfunc = 'load_page'; //定义点击函数名
    public $parameter; // 点击函数要带的参数规定;是&a=1&b=2的形式
    public $p       = 'page'; //分页参数名
    public $nowPage = 1;//当前页

    // 分页显示定制
    private $config  = array(
        'header' => '<li><a class="rows">共 %TOTAL_ROW% 条</a></li>',
        'prev'   => '上一页',
        'next'   => '下一页',
        'first'  => '首页',
        'last'   => '尾页',
        'theme'  => '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%',
    );

    /**
     * 架构函数
     * @param $totalRows  总的记录数
     * @param $listRows=10  每页显示记录数默认为10
     * @param $link=''  分页跳转的参数,规定是&a=1&b=2的形式
     */
    public function __construct($totalRows, $listRows=10, $link='') {
        /* 基础设置 */
        $this->totalRows  = $totalRows; //设置总记录数
        $this->listRows   = $listRows;  //设置每页显示行数
        $this->parameter  = $link?$link:"'#'";
        $this->nowPage    = empty($_GET[$this->p]) ? 1 : intval($_GET[$this->p]);
        $this->firstRow   = $this->listRows * ($this->nowPage - 1);
        $this->totalPages = ceil($this->totalRows / $this->listRows);
    }

    /**
     * 定制分页链接设置
     * @param string $name  设置名称
     * @param string $value 设置值
     */
    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name] = $value;
        }
    }

    /**
     * 组装分页链接
     * @return string
     */
    public function show() {
        if(0 == $this->totalRows) return '';

        /* 计算分页信息 */
        $this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
        if(!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
            $this->nowPage = $this->totalPages;
        }

        /* 计算分页零时变量 */
        $now_cool_page      = $this->rollPage/2;
        $now_cool_page_ceil = ceil($now_cool_page);
        $this->lastSuffix && $this->config['last'] = $this->totalPages;

        //上一页
        $up_row  = $this->nowPage - 1;
        $up_page = $up_row >0 ? '<li><a class="prev" onclick="'.$this->clickfunc .'('.$up_row.','.$this->parameter.')" >' . $this->config['prev'] . '</a></li>' : '';

        //下一页
        $down_row  = $this->nowPage + 1;
        $down_page = ($down_row <= $this->totalPages) ? '<li><a class="next" onclick="'.$this->clickfunc .'('.$down_row.','.$this->parameter.')" >' . $this->config['next'] . '</a></li>' : '';

        //第一页
        $the_first = '';
        if($this->totalPages > $this->rollPage && ($this->nowPage - $now_cool_page) >= 1){
            $the_first = '<li><a class="first" onclick="'.$this->clickfunc .'(1,'.$this->parameter.')">' . $this->config['first'] . '</a></li>';
        }

        //最后一页
        $the_end = '';
        if($this->totalPages > $this->rollPage && ($this->nowPage + $now_cool_page) < $this->totalPages){
            $the_end = '<li><a class="end" onclick="'.$this->clickfunc .'('.$this->totalPages.','.$this->parameter.')" >' . $this->config['last'] . '</a></li>';
        }

        //数字连接
        $link_page = "";
        for($i = 1; $i <= $this->rollPage; $i++){
            if(($this->nowPage - $now_cool_page) <= 0 ){
                $page = $i;
            }elseif(($this->nowPage + $now_cool_page - 1) >= $this->totalPages){
                $page = $this->totalPages - $this->rollPage + $i;
            }else{
                $page = $this->nowPage - $now_cool_page_ceil + $i;
            }
            if($page > 0 && $page != $this->nowPage){

                if($page <= $this->totalPages){
                    $link_page .= '<li><a class="num" onclick="'.$this->clickfunc .'('.$page.','.$this->parameter.')">' . $page . '</a></li>';
                }else{
                    break;
                }
            }else{
                if($page > 0 && $this->totalPages != 1){
                    $link_page .= '<li class="active"><a class="current">' . $page . '</a></li>';
                }
            }
        }

        //替换分页内容
        $page_str = str_replace(
            array('%HEADER%', '%NOW_PAGE%', '%UP_PAGE%', '%DOWN_PAGE%', '%FIRST%', '%LINK_PAGE%', '%END%', '%TOTAL_ROW%', '%TOTAL_PAGE%'),
            array($this->config['header'], $this->nowPage, $up_page, $down_page, $the_first, $link_page, $the_end, $this->totalRows, $this->totalPages),
            $this->config['theme']);
        return $page_str;
    }
}
