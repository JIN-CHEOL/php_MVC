<?php

    header("Content-Type: application/json");
    require_once $_SERVER['DOCUMENT_ROOT']."/param.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/config/DB.php";

    $param = new param;
    $db =new DB;
    $db->DBConn();
    $db->query = "SELECT COUNT(*) AS F_CNT FROM T_CLIENT WHERE F_ID='".$param->post('id')."'";
    $db->DBQuery();
    if($db->result){
        $data = $db->result->fetch_assoc();

        echo(json_encode(array("F_CNT" => $data['F_CNT'])));
    }else{
        echo "<script>alert('쿼리실행 실패!!');</script>";
    }


    $db->DBOut();
?>