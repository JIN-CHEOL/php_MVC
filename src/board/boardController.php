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
    public $currPage;
    public $totalRow;
    public $firstRow;
    public $pageSize;
    public $countPage;
    public function boardController(){
        $this->param = new param;
    }
    public function showBoard(){
        $db = new DB;
        $db->DBConn();
        $searchQuery = "";
        if($this->param->post('search_col') != null && $this->param->post('search_text') != null){
            $searchCol = "";
            if($this->param->post('search_col') =='title'){
                $searchCol = "F_TITLE";
            }else if($this->param->post('search_col') =='writer'){
                $searchCol = "F_WRITER";
            }
            $searchQuery = "AND ".$searchCol." = '".$this->param->post('search_text')."'";
        }

        $this->currPage = $this->param->post('currPage');
        if($this->currPage == null)$this->currPage = 1;

        $this->pageSize = 10;
        $this->countPage = 10;
        $this->firstRow = ($this->currPage*$this->pageSize)-$this->pageSize+1;

        $db->query = "SELECT COUNT(*) AS F_CNT FROM T_BOARD WHERE 1=1 ".$searchQuery;
        $db->DBQuery();
        $data = $db->result->fetch_assoc();
        $this->totalRow = $data['F_CNT'];
//        $this->totalRow = 20;

        $db->query = "SELECT * FROM(
                        SELECT 
                        @ROWNUM:=@ROWNUM + 1 AS F_ROWNUM,
                        T_BOARD.F_IDX,
                        T_BOARD.F_TITLE,
                        T_BOARD.F_CONTENT,
                        T_BOARD.F_WRITER,
                        T_BOARD.F_HIT,
                        T_BOARD.F_WRITE_DATE
                        FROM T_BOARD,(SELECT @ROWNUM:=0)R
                        ORDER BY T_BOARD.F_IDX DESC
                      )T
                      WHERE 1=1
                      ".$searchQuery."
                      LIMIT ".($this->firstRow-1).",".$this->pageSize;
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