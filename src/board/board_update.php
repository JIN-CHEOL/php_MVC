<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-02-01
 * Time: 오전 5:39
 */
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
    <form id="updateForm" method="post" action="/board/board_update_proc.php">
        <input type="hidden" name="idx" value="<?php echo $data['F_IDX']?>">
        <table>
            <tr>
                <th>작성자</th>
                <td><?php echo $data['F_WRITER']?></td>
                <th>조회수</th>
                <td><?php echo $data['F_HIT']?></td>
            </tr>
            <tr>
                <th>제목</th>
                <td><input type="text" name="title" id="title" value="<?php echo $data['F_TITLE']?>"></td>
                <th>등록일</th>
                <td><?php echo $data['F_WRITE_DATE']?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td colspan="3">
                    <textarea name="content" id="content"><?php echo $data['F_CONTENT']?></textarea>
                </td>
            </tr>
        </table>
    </form>
    <div><button type="button" onclick="updateBoardProc()">수정완료</button></div>
    <div><button type="button" onclick="viewDetail('<?php echo $data['F_IDX']?>');">이전</button></div>
    <?php  $db->DBOut();?>
</div>
