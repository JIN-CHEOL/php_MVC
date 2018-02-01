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

    $param = new param;
    $db =new DB;
    $db->DBConn();
    $db->query = "SELECT count(*) AS F_CNT FROM t_client WHERE f_id='".$param->post('id')."'";
    $db->DBQuery();
    if($db->result){
        $data = $db->result->fetch_assoc();

        echo(json_encode(array("F_CNT" => $data['F_CNT'])));
    }else{
        echo "<script>alert('쿼리실행 실패!!');</script>";
    }


    $db->DBOut();
?>