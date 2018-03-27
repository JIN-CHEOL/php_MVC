<link rel="stylesheet" href="/resource/css/style_.css">
<?php
require_once $_SERVER['DOCUMENT_ROOT']."/board/boardController.php";
require_once $_SERVER['DOCUMENT_ROOT']."/commonController.php";

$controller = new boardController();
$common = new commonController;

$controller->boardList();
$param = $controller->param;
?>

<div id="header">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';
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

        if(isNull($('#search_text'))){
            alert("검색어를 입력하세요.");
        }

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
    <p class="board_search">
        <select class="h40 w100" name="search_col" id="search_col">
            <option value="title">제목</option>
            <option value="writer">작성자</option>
            <option value="content">내용</option>
        </select>
        <input class="w200 h40 input1" type="text" name="search_text" id="search_text" value="<?php echo $controller->param->post('search_text')?>">
        <button class="button button1 " type="button" onclick="searchBoard()">조회</button>

    </p>

<p>
    <table class="board_table">
        <tr>
            <th class="board_th">No.</th>
            <th class="board_th">제목</th>
            <th class="board_th">등록자</th>
            <th class="board_th">조회수</th>
            <th class="board_th">등록일</th>
        </tr>
        <?php
            $count = $controller->db->result->num_rows;
            if($count>0){
                while($row = $controller->db->result->fetch_assoc()){
                    echo "<tr style='text-align: center'>
                                <td class='board_td1 h50'>".$row['F_ROWNUM']."</td>
                                <td class='board_td1 h50 w200'><a href='#' onclick=javascript:viewDetail('".$row['F_IDX']."')>".$row['F_TITLE']."</a></td>
                                <td class='board_td1 h50'>".$row['F_WRITER']."</td>
                                <td class='board_td1 h50'>".$row['F_HIT']."</td>
                                <td class='board_td1 h50 w300'>".$row['F_WRITE_DATE']."</td>
                           </tr>";
                }
            }else{
                echo "<tr><td colspan='5'>검색된 내용이 없습니다.</td></tr>";
            }
            $controller->db->DBOut();
        ?>

    </table>
</p><br><br>
    <p class="pageNavigation">
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

        ?>
    </p>
<br>
    <p>
        <button type="button" class=" button button1 board_button1" onclick="insertBoard();">글등록</button>
    </p>
</div>

