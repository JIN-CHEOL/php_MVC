<?php

require_once '../param.php';
require_once '../config/DB.php';

$param = new param;
$db = new DB;
$db->DBConn();
$db->query = "SELECT 
                    F_IDX,
                    F_TITLE,
                    F_CONTENT,
                    F_WRITER,
                    F_HIT,
                    F_WRITE_DATE
                    FROM t_board 
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
require_once '../header.php';
?>
</div>
<script type="text/javascript">
    function updateBoardProc(){
        if(isNull($('#title'))){
            alert("제목을 입력해주세요.");
            return;
        }
        if(isNull($('#content'))){
            alert("내용을 입력해주세요.");
            return;
        }
        $('#updateForm').submit();
    }
    function viewDetail(idx){
        var form = new CommonForm('commonForm');
        form.addParam('idx',idx);
        form.setUrl('/board/board_detail.php');
        form.submit();
    }
</script>

<div id="center">
    <p>
    <form id="updateForm" method="post" action="./board_update_proc.php">
        <input type="hidden" name="idx" value="<?php echo $data['F_IDX']?>">
        <table class="board_table">
            <tr>
                <th class="board_th">작성자</th>
                <td class="board_td2 w300"><?php echo $data['F_WRITER']?></td>
                <th class="board_th">조회수</th>
                <td class="board_td2 w300"><?php echo $data['F_HIT']?></td>
            </tr>
            <tr>
                <th class="board_th">제목</th>
                <td class="board_td1 w300"><input class="input w310 h50" type="text" name="title" id="title" value="<?php echo $data['F_TITLE']?>"></td>
                <th class="board_th">등록일</th>
                <td class="board_td2 w300"><?php echo $data['F_WRITE_DATE']?></td>
            </tr>
            <tr>
                <th class="board_th">내용</th>
                <td class="board_td1 h300" colspan="3">
                    <textarea class="input w750 h300"  name="content" id="content"><?php echo $data['F_CONTENT']?></textarea>
                </td>
            </tr>
        </table>
    </form>
    </p><br><br>
    <p><button class="button button1 board_button2 input" type="button" onclick="updateBoardProc()">수정완료</button>
    <button class="button button1 board_button1 input" type="button" onclick="viewDetail('<?php echo $data['F_IDX']?>');">이전</button></p>
    <?php  $db->DBOut();?>
</div>
