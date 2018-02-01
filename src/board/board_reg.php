<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-02-01
 * Time: 오전 4:20
 */

require_once '../param.php';
$param = new param;
    if($param->session('client') == null){
        echo "<script>alert('로그인을 해주세요.');location.href='/login/login.php';</script>";
    }

?>
<div id="header">
    <?php
    require_once '../header.php';
    ?>
</div>
<script type="text/javascript">
    function insertBoardProc(){
        if(isNull($('#title'))){
            alert("제목을 입력해주세요.");
            return;
        }
        if(isNull($('#content'))){
            alert("내용을 입력해주세요.");
            return;
        }
        if(isNull($('#passwd'))){
            alert("비밀번호를 입력해주세요.");
            return;
        }
        $('#insertForm').submit();
    }

</script>
<div id="center">
    <form id="insertForm" method="post" action="/board/board_reg_proc.php">
        <input type="hidden" name="writer" value="<?php echo $param->session('client')['F_ID']?>">
        <table>
            <tr>
                <th>작성자</th>
                <td><?php echo $param->session('client')['F_ID']?></td>
            </tr>
            <tr>
                <th>제목</th>
                <td><input type="text" name="title" id="title" value=""></td>
            </tr>
            <tr>
                <th>내용</th>
                <td colspan="3">
                    <textarea name="content" id="content"></textarea>
                </td>
            </tr>
            <tr>
                <th>비밀번호</th>
                <td><input type="password" name="passwd" id="passwd"></td>
            </tr>
        </table>
    </form>
    <div><button type="button" onclick="insertBoardProc()">글등록</button></div>
</div>
