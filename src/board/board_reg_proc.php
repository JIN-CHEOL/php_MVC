<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-02-01
 * Time: 오전 7:08
 */
    require_once $_SERVER['DOCUMENT_ROOT'].'param.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/config/DB.php';

    $param = new param;
    $db = new DB;
    $db->DBConn();
    $db->query = "INSERT INTO 
                          T_BOARD(
                          F_WRITER,
                          F_TITLE,
                          F_CONTENT,
                          F_HIT,
                          F_WRITE_DATE,
                          F_BOARD_PASS) 
                          VALUES(
                          '".$param->post('writer')."',
                          '".$param->post('title')."',
                          '".$param->post('content')."',
                          0,
                          NOW(),
                          PASSWORD('".$param->post('passwd')."'))";
    $db->DBQuery();
    echo "<script>
                        window.onload = function(){
                            alert('등록되었습니다.');
                            var form = document.getElementById('commonForm');
                            form.setAttribute('action','/board/board.php');
                            form.setAttribute('method','post');
                            form.submit();
                        };
                  </script>";
    if($db->result){

    }else{
        echo "<script>alert('쿼리실행 실패!!');location.href='/'</script>";
    }
?>
<form id="commonForm">
<!--    <input type="hidden" name="idx" value="--><?php //echo $param->post('idx')?><!--">-->
</form>
