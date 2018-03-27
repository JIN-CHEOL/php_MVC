<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-06
 * Time: 오후 10:49
 */

class DB
{
    public $db;
    public $query;
    public $result;

    public function DBConn(){
        //host, id ,pw, database 순서입니다.
        $this->db = new mysqli('localhost','root','P@ssw0rd','php_mvc');
        $this->db->query('SET NAMES UTF8');
        if(mysqli_connect_errno()){
            echo "데이터 베이스 연동에 실패했습니다";
            exit;
        }else{
         //   echo "데이터 베이스 연동에 성공했습니다.";
        }
        //한글 깨짐 현상
        //header("Content-Type: text/html; charset=UTF-8");
        $this->db->set_charset("set session character_set_connection=utf8;");
        $this->db->set_charset("set session character_set_results=utf8;");
        $this->db->set_charset("set session character_set_client=utf8;");
    }

    public function DBQuery(){
        $this->result = $this->db->query($this->query);
    }

    public function DBOut(){
        $this->result->free();
        $this->db->close();
    }
}

?>