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
<div id="center">
    <!--여기에 게시판 만드시면되요-->
</div>

