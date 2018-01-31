<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-07
 * Time: 오전 12:01
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

    require_once '../param.php';
    require_once '../config/DB.php';

class loginController
{
    public $title="";
    public $param;

    public function loginController() {
        $this->param = new param;
    }

    public function login() {
        $db = new DB;
        $db->DBConn();
        $db->query = "SELECT 
                      F_ID,
                      F_PASSWORD,
                      F_NAME,
                      F_GENDER,
                      F_BIRTH_DAY,
                      F_PHONE_NUM1,
                      F_PHONE_NUM2,
                      F_PHONE_NUM3,
                      F_JOIN_DATE,
                      F_RETIRE_YN
                      FROM T_CLIENT 
                      WHERE F_ID='".$this->param->POST('id')."' 
                      AND F_PASSWORD=PASSWORD('".$this->param->POST('passwd')."')";
        $db->DBQuery();
        $this->loginProc($db);

        $db->DBOut();
    }

    public function loginProc($db) {
        $id = $this->param->post('id');
        $pass = $this->param->post('passwd');
        $num = $db->result->num_rows;
        $data = $db->result->fetch_assoc();

        if($num==1){

            $_SESSION['client'] = $data;

            echo "<script>location.replace('/');</script>";
        } else if(($id!="" || $pass!="") && $data['F_ID']!=1){
            echo "<script>alert('아이디와 비밀번호가 맞지 않습니다.');</script>";
        }
    }

    public function logoutProc(){
        unset($_SESSION['client']);
        session_destroy();

        echo "<script>alert('로그아웃 되었습니다.');location.replace('/')</script>";
    }
}

?>