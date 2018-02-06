<?php

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
    <p>
    <form id="insertForm" method="post" action="./board_reg_proc.php">
        <input type="hidden" name="writer" value="<?php echo $param->session('client')['F_ID']?>">
        <table class="board_table">
            <tr>
                <th class="board_th">작성자</th>
                <td class="board_td2"><?php echo $param->session('client')['F_ID']?></td>
            </tr>
            <tr>
                <th class="board_th">제목</th>
                <td class="board_td1 w750"><input class="input w750 h60" type="text" name="title" id="title" value=""></td>
            </tr>
            <tr>
                <th class="board_th">비밀번호</th>
                <td class="board_td1 w750"><input class="input w750 h60" type="password" name="passwd" id="passwd"></td>
            </tr>
            <tr >
                <th class="board_th">내용</th>
                <td class="board_td1 w750 h300"><textarea class="input w750 h300" name="content" id="content"></textarea></td>
            </tr>

        </table>
    </form>
    </p><br><br>
    <p>
        <span>
            <button class="button button1 input board_button2" type="button" onclick="insertBoardProc()">글등록</button>
        </span>
        <span>
            <button class="button button1 input board_button1" type="button" onclick="location.href='./board.php'">글목록</button>
        </span>
    </p>
</div>
