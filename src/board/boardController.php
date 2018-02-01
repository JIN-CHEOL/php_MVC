<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-17
 * Time: 오후 4:33
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../param.php';
require_once '../config/DB.php';

class boardController
{
    public $param;
    public $db;
    public function boardController(){
        $this->param = new param;
    }
    public function showBoard(){
        $db = new DB;
        $db->DBConn();
        $db->query = "SELECT 
                        F_IDX,
                        F_TITLE,
                        F_CONTENT,
                        F_WRITER,
                        F_HIT,
                        F_WRITE_DATE
                        FROM t_board";
        $db->DBQuery();
        if($db->result){
            $this->db = $db;
        }else{
            echo "<script>alert('쿼리실행 실패!!');location.href='/'</script>";
            $db->DBOut();
        }
    }
    public function insertBoard(){
        $db = new DB;
        $db->DBConn();
        $db->query = "INSERT INTO
                      T_BOARD(F_WRITER,F_TITLE,F_CONTENT,F_WRITER_DATE,F_BOARD_PASS)
                      VALUES(
                      ".$this->param->session('client').",
                      ".$this->param->post('title').",
                      ".$this->param->post('content').",
                      DATE(NOW()),
                      ".$this->param->post('board_pass')."
                      )";
        $db->DBQuery();

        $db->DBOut();
    }
    public function updateBoard(){
        $db = new DB;
        $db->DBConn();
        $db->query = "UPDATE T_BOARD SET
                      F_WRITER = ".$this->param->session('client').",
                      F_TITLE = ".$this->param->post('title').",
                      F_CONTENT = ".$this->param->post('content').",
                      F_BOARD_PASS = ".$this->param->post('board_pass')."
                      WHERE
                      F_IDX = ".$this->param->post('idx');
        $db->DBQuery();

        $db->DBOut();
    }
    public function deleteBoard(){
        $db = new DB;
        $db->DBConn();
        $db->query = "delete from t_board where f_idx = ".$this->param->post('idx');
        $db->DBQuery();

        $db->DBOut();
    }

}