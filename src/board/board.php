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
    function searchBoard(){
        var search_col = $('#search_col').val();
        var search_text = $('#search_text').val();
        var form = new CommonForm('commonForm');
        form.addParam('search_col',search_col);
        form.addParam('search_text',search_text);
        form.setUrl('/board/board.php');
        form.submit();
    }
    function movePage(page){
        var search_col = $('#search_col').val();
        var search_text = $('#search_text').val();
        var form = new CommonForm('commonForm');
        form.addParam('search_col',search_col);
        form.addParam('search_text',search_text);
        form.addParam('currPage',page);
        form.setUrl('/board/board.php');
        form.submit();
    }
</script>
<div id="center">
    <div>
        <select name="search_col" id="search_col">
            <option value="title">제목</option>
            <option value="writer">작성자</option>
        </select>
        <input type="text" name="search_text" id="search_text" value="<?php echo $controller->param->post('search_text')?>">
        <button type="button" onclick="searchBoard()">조회</button>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>제목</th>
            <th>등록자</th>
            <th>조회수</th>
            <th>등록일</th>
        </tr>
        <?php
            $count = $controller->db->result->num_rows;
            if($count>0){
                while($row = $controller->db->result->fetch_assoc()){
                    echo "<tr>
                                <td>".$row['F_ROWNUM']."</td>
                                <td><a href='#' onclick=javascript:viewDetail('".$row['F_IDX']."')>".$row['F_TITLE']."</a></td>
                                <td>".$row['F_WRITER']."</td>
                                <td>".$row['F_HIT']."</td>
                                <td>".$row['F_WRITE_DATE']."</td>
                           </tr>";
                }
            }else{
                echo "<tr><td colspan='5'>검색된 내용이 없습니다.</td></tr>";
            }
            $controller->db->DBOut();
        ?>
    </table>
    <div class="pageNavigation">
        <?php
        $page = floor($controller->currPage / $controller->pageSize) * $controller->pageSize +1;
        if($controller->currPage > $controller->pageSize)
            echo "<a href='#' onclick='movePage(".($page-10).");'>이전</a>";

        $i = $page;
        if(floor($controller->totalRow / $controller->pageSize) < $controller->countPage){
            $controller->countPage = floor($controller->totalRow / $controller->pageSize)+1;
        }
        while($i<=$controller->countPage){
            echo "<a href='#' onclick=movePage(".$i.");>".$i."</a>";
          $i=$i+1;
       }
       $controller->countPage=10;
        if($controller->currPage > $controller->totalRow-floor($controller->totalRow / $controller->countPage))
            echo "<a href='#' onclick='movePage(".($page+10).");'>다음</a>";

        //echo "<br> currPage:".$controller->currPage."// totalRow:".$controller->totalRow."//countPage:".$controller->countPage."//firstRow:".$controller->firstRow;
        ?>
    </div>
    <div><button type="button" onclick="insertBoard();">글등록</button></div>
</div>

