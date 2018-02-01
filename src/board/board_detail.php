<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-02-01
 * Time: 오전 4:49
 */
    require_once '../param.php';
    require_once '../config/DB.php';

    $param = new param;
    $db = new DB;
    $db->DBConn();
    $db->query = "UPDATE t_board 
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
    <table>
        <tr>
            <th>작성자</th>
            <td><?php echo $data['F_WRITER']?></td>
            <th>조회수</th>
            <td><?php echo $data['F_HIT']?></td>
        </tr>
        <tr>
            <th>제목</th>
            <td><?php echo $data['F_TITLE']?></td>
            <th>등록일</th>
            <td><?php echo $data['F_WRITE_DATE']?></td>
        </tr>
        <tr>
            <th>내용</th>
            <td colspan="3">
                <?php echo $data['F_CONTENT']?>
            </td>
        </tr>
    </table>
    <div>
        <button type="button" onclick="updateBoard('<?php echo $data['F_IDX']?>');">수정</button>
        <button type="button" onclick="deleteBoard('<?php echo $data['F_IDX']?>');">삭제</button>
    </div>
    <div>
        <button type="button" onclick="location.href='/board/board.php'">목록</button>
    </div>
    <?php  $db->DBOut();?>
</div>
