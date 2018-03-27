<link rel="stylesheet" href="/resource/css/style_.css">
<script src="/resource/js/jquery-3.2.1.min.js"></script>
<script src="/resource/js/common_util.js"></script>
<?php

require_once $_SERVER['DOCUMENT_ROOT']."/indexController.php";
require_once$_SERVER['DOCUMENT_ROOT']."/commonController.php";
$controller = new indexController();
$common = new commonController;

$param = $controller->param;


?>
<script type="text/javascript">
    function logout() {
        location.replace("/login/logout.php");

    }
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
<style>

    span
    {
        height: 90%;
        width:32%;
        float: left;
        padding:10px 0 0 10px;
    }
</style>

<body>
    <?php
    if($param->session('client')!=null){
        echo "<span><button id='logout' class=\"input button h50 w400\" type='button' onclick='logout();'>logout</button></span><span></span>";
    }else{
        echo "<span><form id=\"loginForm\" method=\"post\" action=\"./login/login.php\"> 
               <input type=\"text\" class=\"input h50 w200\" name=\"id\" id=\"client_id\" placeholder=\"ID\" onkeydown=\"javascript:if(event.keyCode==13)login();\">
            <input type=\"password\" class=\"input h50 w200\" name=\"passwd\" id=\"client_passwd\" placeholder=\"PASSWORD\" onkeydown=\"javascript:if(event.keyCode==13)login();\">
        <p><button type=\"button\" class=\"input button h50 w400\" onclick=\"login()\">로그인</button></form></p></span>
        <span><input class=\"input button h50 w400\"type=\"button\" value=\"회원가입\" onclick=\"location.href='login/login_reg.php'\"></span>";
    }
    ?>

    <span style="text-align: center">
        사업자 등록 123468765321321
    </span>

</body>
</html>