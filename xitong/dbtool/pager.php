<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pager
 *
 * @author Admin
 */
class pager {
    public $pageSize;//页面大小
    public $currentPage;//当前页码
    public $recordNumber;//总记录数
    public $pageCount;//总页数
    public $forwardPage;//上一页页码
    public $nextPage;//下一页页码
    public $url;//调用页面的地址
    public function __construct($_pageSize,$_currentPage,$_recordNumber,$_url)
    {
        $this->pageSize=$_pageSize;//页面大小
        $this->currentPage=$_currentPage;//当前页码
        $this->recordNumber=$_recordNumber;//总记录数
        $this->pageCount=  ceil($_recordNumber/$_pageSize);//总页数
        $this->forwardPage=$_currentPage>1?($_currentPage-1):$_currentPage;//上一页页码
        $this->nextPage=$_currentPage<$this->pageCount?($_currentPage+1):$_currentPage;//下一页页码
        $this->url=$_url;//调用页面的地址
    }
    public function create()
    {
        echo "<a href=".$this->url."?page=1>首页 | </a>";
        echo "<a href=".$this->url."?page=".$this->forwardPage.">上一页 | </a>";
        echo "共".$this->pageCount."页".$this->recordNumber."条记录";
        echo "<a href=".$this->url."?page=".$this->nextPage.">| 下一页 | </a>";
        echo "<a href=".$this->url."?page=".$this->pageCount.">尾页</a>";
    }
}

?>
