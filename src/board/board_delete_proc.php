<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-02-01
 * Time: 오전 6:31
 */
    require_once $_SERVER['DOCUMENT_ROOT'].'/param.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/config/DB.php';

    $param = new param;
    $db = new DB;
    $db->DBConn();
    $db->query = "DELETE FROM T_BOARD  
                        WHERE F_IDX = ".$param->post('idx')."
                        AND F_BOARD_PASS = PASSWORD('".$param->post('passwd')."')";

    $db->DBQuery();

    if($db->result){
        echo "<script>alert('삭제되었습니다.');opener.document.location.href='/board/board.php';window.close();</script>";
    }else{
        echo "<script>alert('비밀번호를 확인해주세요.');window.close();</script>";

    }
?>