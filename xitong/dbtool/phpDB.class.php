<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of phpDB
 *
 * @author Admin
 */
class phpDB {
    //put your code here
    private $config=array(
        'host'=>'localhost',
        'port'=>'9009',
        'user'=>'',
        'pwd'=>'',
        'charset'=>'set names utf8',
        'database'=>''
    );
    private $conn;
    public static $instance;

    //为数据库配置数组$config赋值
    private function initArray($params)
    {
        $this->config=  array_merge($this->config,$params);
    }
    //打开数据库连接，为$conn赋初值
    private function connectDB()
    {
        $host=  $this->config['host'];
        $port=  $this->config['port'];
        $user=  $this->config['user'];
        $pwd=  $this->config['pwd'];
        $db=  $this->config['database'];
        $this->conn=  mysqli_connect("$host", $user, $pwd,$db);
        if(!$this->conn)
        {    
            die('数据库连接失败!'.mysql_error());
        }
    }
    //设置连接的编码格式
    private function charSet()
    {
        mysqli_query($this->conn,  $this->config['charset']);
    }
    //构造函数，为类的数据成员赋初值
    private function __construct($params=  array()) {
        $this->initArray($params);
        $this->connectDB();
        $this->charSet();
    }
    //单例对象，类的入口函数
    public static function getInstanc($params=array())
    {
        if(!self::$instance instanceof self)
        {
            static::$instance=new self($params);
        }
        return static::$instance;
    }

    public function query($sql)
    {
        if($result = mysqli_query($this->conn, $sql)){
            return $result;
        }  else {
            echo 'SQL执行失败:<br>';
            echo '错误的SQL为:', $sql, '<br>';
            echo '错误的代码为:', mysql_errno(), '<br>';
            echo '错误的信息为:', mysql_error(), '<br>';
            die;
        }
    }
    //处理单条记录，把结果集中的数据转换成一维数组
    public function fetchRow($sql)
    {
        if($result= $this->query($sql)){
            $row = mysqli_fetch_row($result);
            return $row;
        }
        else {
            return FALSE;
        }
    }
    //把结果集中的数据转换成二维数组
    public function fetchAll($sql)
    {
        if($result= $this->query($sql)){
            $rows = array();
            while ($row = mysqli_fetch_row($result))
            {
                $rows[]=$row;
            }
            return $rows;
        }
        else {
            return FALSE;
        }
    }
 }

?>
