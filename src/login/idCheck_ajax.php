<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-31
 * Time: 오후 8:51
 */
    header("Content-Type: application/json");
    require_once "../param.php";
    require_once "../config/DB.php";

//    echo "<script>alert('".$_POST['id']."');</script>";
    $param = new param;
    $db =new DB;
    $db->DBConn();
    $db->query = "SELECT count(*) AS F_CNT FROM t_client WHERE f_id='".$param->post('id')."'";
    $db->DBQuery();
    if($db->result){
        $data = $db->result->fetch_assoc();

//        echo "<script>alert('".$data[0]."');</script>";
        echo(json_encode(array("F_CNT" => $data['F_CNT'])));
    }else{
        echo "<script>alert('쿼리실행 실패!!');</script>";
    }

//    if($data['F_CNT']>0){
//        echo "<script>alert('id가 존재합니다');</script>";
//    }else{
//        echo "<script>alert('사용가능한 ID 입니다.');</script>";
//    }

    $db->DBOut();
?>