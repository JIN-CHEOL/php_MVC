<link rel="stylesheet" href="/resource/css/style_.css">
<script src="/resource/js/jquery-3.2.1.min.js"></script>
<script src="/resource/js/common_util.js"></script>
<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/login/loginController.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/commonController.php";

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
<span><a href="/" class="header_logo">homepage</a></span>
</div>
<div id="center">
    <form id="loginForm" method="post" action="login.php" class="login_form">
        <p><input class="input1 h50 w400" type="text" name="id" id="client_id" placeholder="ID" onkeydown="javascript:if(event.keyCode==13)login();"></p>
        <p><input class="input1 h50 w400" type="password" name="passwd" placeholder="PW" id="client_passwd" onkeydown="javascript:if(event.keyCode==13)login();"></p>
        <p><button class="button h50 w400" type="button" onclick="login()">로그인</button></p>

        <hr align="left">
        <p>
            <button class="button h50 w130" type="button" onclick="location.href='../login/login_reg.php'">회원가입</button>
            <button class="button h50 w130" type="button" onclick="find_id()">아이디 찾기</button>
            <button class="button h50 w130" type="button" onclick="find_password()">비밀번호 찾기</button>
        </p>

    </form>
</div>
