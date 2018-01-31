<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-31
 * Time: 오후 11:33
 */

require_once "../param.php";
require_once "../config/DB.php";

$param = new param;
$db =new DB;
$db->DBConn();
$db->query = "INSERT INTO 
                t_client(
                F_ID,
                F_PASSWORD,
                F_NAME,
                F_GENDER,
                F_BIRTH_DAY,
                F_PHONE_NUM1,
                F_PHONE_NUM2,
                F_PHONE_NUM3,
                F_JOIN_DATE,
                F_RETIRE_YN) 
                VALUES(
                '".$param->post('id')."',
                password('".$param->post('passwd')."'),
                '".$param->post('name')."',
                ".$param->post('gender').",
                DATE('".$param->post('birth_day')."'),
                '".$param->post('phone_num1')."',
                '".$param->post('phone_num2')."',
                '".$param->post('phone_num3')."',
                now(),
                0)";
$db->DBQuery();
if($db->result){
    echo "<script>alert('회원가입 되었습니다.\\n로그인을 해주세요.');location.href='/';</script>";
}else{
    echo "<script>alert('쿼리실행 실패!!');location.href='/'</script>";
}
?>
