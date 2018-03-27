<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-02-01
 * Time: 오전 6:36
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/param.php';
$param = new param;
?>
<link rel="stylesheet" href="/resource/css/style_.css">
<script src="/resource/js/jquery-3.2.1.min.js"></script>
<script src="/resource/js/common_util.js"></script>


<script type="text/javascript">
    function deleteBoardProc(){
        if(isNull($('#passwd'))){
            alert('패스워드를 입력해주세요.');
            return;
        }
        $('#deleteForm').submit();
    }
</script>
<div align="center">
    <br>
게시물 삭제
    <br>
<hr>
<form id="deleteForm" method="post" action="./board_delete_proc.php">
    <input type="hidden" name="idx" value="<?php echo $param->post('idx')?>">
   비밀번호 &nbsp;&nbsp;&nbsp;
   <input class="input1 w200 h50 " type="password" name="passwd" id="passwd">
</form>

    <button class="button h50 w300" type="button" onclick="deleteBoardProc()">삭제하기</button>

</div>