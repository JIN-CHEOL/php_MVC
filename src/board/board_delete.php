<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-02-01
 * Time: 오전 6:36
 */
require_once '../param.php';
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
게시물 삭제 페이지
<form id="deleteForm" method="post" action="/board/board_delete_proc.php">
    <input type="hidden" name="idx" value="<?php echo $param->post('idx')?>">
    <table>
        <tr>
            <th>비밀번호</th>
            <td><input type="password" name="passwd" id="passwd"></td>
        </tr>
    </table>
</form>
<div>
    <button type="button" onclick="deleteBoardProc()">삭제하기</button>
</div>
