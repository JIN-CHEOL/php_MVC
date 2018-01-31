<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-31
 * Time: 오후 8:51
 */
    require_once "../param.php";
    require_once "../config/DB.php";

    $param = new param;
    $db =new DB;
    $db->DBConn();
    $db->query = "SELECT count(*) FROM t_client WHERE f_id=".$param->post('id');
    $db->DBQuery();

    $db->DBOut();
?>