<link rel="stylesheet" href="../resource/css/style_.css">
<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-17
 * Time: 오후 4:33
 */
require_once "boardController.php";
require_once "../commonController.php";

$controller = new boardController();
$common = new commonController;

$controller->showBoard();
$param = $controller->param;
?>

<div id="header">
    <?php
    require_once '../header.php';
    ?>
</div>
<script type="text/javascript">
    function viewDetail(idx){
        var form = new CommonForm('commonForm');
        form.addParam('idx',idx);
        form.setUrl('/board/board_detail.php');
        form.submit();
    }
    function insertBoard(){
        location.href='/board/board_reg.php';
    }
</script>
<div id="center">
    <table>
        <tr>
            <th>No.</th>
            <th>제목</th>
            <th>등록자</th>
            <th>조회수</th>
            <th>등록일</th>
        </tr>
        <?php
            while($row = $controller->db->result->fetch_assoc()){
                echo "<tr>
                            <td>".$row['F_IDX']."</td>
                            <td><a href='#' onclick=javascript:viewDetail('".$row['F_IDX']."')>".$row['F_TITLE']."</a></td>
                            <td>".$row['F_WRITER']."</td>
                            <td>".$row['F_HIT']."</td>
                            <td>".$row['F_WRITE_DATE']."</td>
                       </tr>";
            }
            $controller->db->DBOut();
        ?>
    </table>
    <div><button type="button" onclick="insertBoard();">글등록</button></div>
</div>

