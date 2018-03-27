<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/param.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/config/DB.php';

    $param = new param;
    $db = new DB;
    $db->DBConn();
    $db->query = "UPDATE T_BOARD 
                    SET F_HIT = F_HIT + 1 
                    WHERE F_IDX = ".$param->post('idx');
    $db->DBQuery();
    $db->query = "SELECT 
                    F_IDX,
                    F_TITLE,
                    F_CONTENT,
                    F_WRITER,
                    F_HIT,
                    F_WRITE_DATE
                    FROM T_BOARD 
                    WHERE F_IDX = ".$param->post('idx');
    $db->DBQuery();

    if($db->result){
        $data = $db->result->fetch_assoc();
    }else{
        echo "<script>alert('쿼리실행 실패!!');location.href='/'</script>";
    }
?>

<div id="header">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';
    ?>
</div>
<script type="text/javascript">
    function updateBoard(idx){
        var form = new CommonForm('commonForm');
        form.addParam('idx',idx);
        form.setUrl('/board/board_update.php');
        form.submit();
    }
    function deleteBoard(idx){
        window.open('','delBoard','width=450, height=200, menubar=no, status=no, toolbar=no, resizable=no');
        var form = new CommonForm('commonForm');
        form.addParam('idx',idx);
        $('#commonForm').attr('target','delBoard');
        form.setUrl('/board/board_delete.php')
        form.submit();
    }
</script>
<div id="center">
    <p>
    <table class="board_table">
        <tr>
            <th class="board_th">작성자</th>
            <td class="board_td2 w300"><?php echo $data['F_WRITER']?></td>
            <th class="board_th">조회수</th>
            <td class="board_td2 w300"><?php echo $data['F_HIT']?></td>
        </tr>
        <tr>
            <th class="board_th">제목</th>
            <td class="board_td2 w300 font"><?php echo $data['F_TITLE']?></td>
            <th class="board_th">등록일</th>
            <td class="board_td2 w300"><?php echo $data['F_WRITE_DATE']?></td>
        </tr>
        <tr>
            <th class="board_th">내용</th>
            <td class="board_td2 h300" colspan="3"><?php echo $data['F_CONTENT']?></td>
        </tr>
    </table>
    </p>
    <br> <br>
    <p>
        <?php
            if($data['F_WRITER'] == $param->session('client')['F_ID']){
                echo " <button class='button button1 board_button3 input' type='button' onclick=updateBoard('" .$data['F_IDX']."')>수정</button> 
                <button class='button button1 board_button2 input' type='button' onclick=deleteBoard('".$data['F_IDX']."')>삭제</button>";
            }
        ?>
        <button class="button button1 board_button1 input" type="button" onclick="location.href='/board/board.php'">목록</button>
    </p>



    <?php  $db->DBOut();?>
</div>
