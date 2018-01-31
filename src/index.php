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
<script type="text/javascript">
    $(function(){

    })
    function login(){
        location.replace("/login/login.php");

    }
    function logout() {
        location.replace("/login/logout.php");
        //var id = sessionStorage.getItem('id');
        //var permit =sessionStorage.getItem('permit');

        //debugger;
//        alert("로그아웃 되었습니다.");
//        location.replace("/");
    }

</script>
<link rel="stylesheet" href="./resource/css/style_.css">
<script src="./resource/js/jquery-3.2.1.min.js"></script>
<script src="./resource/js/common_util.js"></script>
<style>
    .board{
        width: 200px;
        height: 150px;
        position: absolute;
        top: 20%;
        left:60%;
        border: 2px solid white;
        border-radius: 5px;
    }
    .ex{
        width: 200px;
        height: 150px;
        position: absolute;
        top: 42%;
        left:60%;
        border: 2px solid white;
        border-radius: 5px;
    }
    .ex2{
        width: 200px;
        height: 150px;
        position: absolute;
        top: 42%;
        left:44%;
        border: 2px solid white;
        border-radius: 5px;
    }
</style>

<body>
<div id="main_center">
    <a href="/" class="main_logo">homepage</a>
    <input class="board" type="image" src="./resource/image/board.png" onclick="location.href='board/board.php'">
    <input class="ex" type="image" src="./resource/image/ex.png" onclick="">
    <input class="ex2" type="image" src="./resource/image/ex2.png" onclick="">
</div>
<div id="footer">
    <?php
    require_once 'footer.php';
    ?>
</div>
<div id="login">
    <?php
    if($param->session('client')!=null){
        echo "<button id='logout' type='button' onclick='logout();'>로그아웃</button>";
    }else{
        echo "<button id='login' type='button' onclick='login();'>로그인</button>";
    }
    ?>
</div>
</body>





