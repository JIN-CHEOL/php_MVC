<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-02-01
 * Time: 오전 5:56
 */
    require_once '../param.php';
    require_once '../config/DB.php';

    $param = new param;
    $db = new DB;
    $db->DBConn();
    $db->query = "UPDATE t_board 
                    SET F_TITLE = '".$param->post('title')."', 
                    F_CONTENT = '".$param->post('content')."' 
                    WHERE F_IDX = ".$param->post('idx');
    $db->DBQuery();
        echo "<script>
                    window.onload = function(){
                        alert('수정되었습니다.');
                        var form = document.getElementById('commonForm');
                        form.setAttribute('action','/board/board_detail.php');
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
    <input type="hidden" name="idx" value="<?php echo $param->post('idx')?>">
</form>
