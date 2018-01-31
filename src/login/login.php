<link rel="stylesheet" href="../resource/css/style_.css">
<script src="../resource/js/jquery-3.2.1.min.js"></script>
<script src="../resource/js/common_util.js"></script>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-06
 * Time: 오후 11:42
 */

    require_once "loginController.php";
    require_once "../commonController.php";

    $controller = new loginController();
    $common = new commonController;

    $controller->login();
    $param = $controller->param;

?>

<script type="text/javascript">
    function login(){
        console.log($('#client_id').val() +','+$('#client_passwd').val());
        if(isNull($("#client_id"))){
            alert("아이디를 입력해주세요.");
            return;
        }
        if(isNull($('#client_passwd'))){
            alert("비밀번호를 입력해주세요.");
            return;
        }
        $('#loginForm').submit();
    }
    function find_id(){

    }
    function find_password(){

    }

</script>

<body>
<div id="header">
    <?php
    require_once '../header.php';
    ?>
</div>
<div id="center">
    <form id="loginForm" method="post" action="">

            <input type="text" name="id" id="client_id" onkeydown="javascript:if(event.keyCode==13)login();">
            <input type="password" name="passwd" id="client_passwd" onkeydown="javascript:if(event.keyCode==13)login();">

        <button type="button" onclick="login()">로그인</button>
        <button type="button" onclick="location.href='../login/login_reg.php'">회원가입</button>
        <button type="button" onclick="find_id()">아이디 찾기</button>
        <button type="button" onclick="find_password()">비밀번호 찾기</button>


    </form>
</div>
