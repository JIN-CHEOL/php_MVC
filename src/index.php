<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-06
 * Time: 오후 10:47
 */

    require_once "./indexController.php";
    require_once "./commonController.php";
    $controller = new indexController();
    $common = new commonController;

    $param = $controller->param;


?>
<link rel="stylesheet" href="./resource/css/style_.css">
<script src="./resource/js/jquery-3.2.1.min.js"></script>
<script src="./resource/js/common_util.js"></script>
<script type="text/javascript">
    $(function(){

    })
    function login(){
        location.replace("/login/login.php");
    }
    function logout() {
        location.replace("/login/logout.php");

    }

</script>


<body>
<div id="main_center">
    <a href="/" class="main_logo">homepage</a>
    <input class="board" type="image" src="./resource/image/board.png" onclick="location.href='board/board.php'">
    <input class="ex" type="image" src="./resource/image/ex.png" onclick="location.href=">
    <input class="ex2" type="image" src="./resource/image/ex2.png" onclick="">
</div>
<div id="footer">
    <?php
    require_once 'footer.php';
    ?>
</div>

</body>





