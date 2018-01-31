<link rel="stylesheet" href="./resource/css/style_.css">
<script src="./resource/js/jquery-3.2.1.min.js"></script>
<script src="./resource/js/common_util.js"></script>
<?php

require_once "./indexController.php";
require_once "./commonController.php";
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
<html lang='ko'>

<body>




    <?php
    if($param->session('client')!=null){
        echo "<span><button id='logout' class=\"button\" type='button' onclick='logout();'>logout</button></span>";
    }else{
        echo "<form id=\"loginForm\" method=\"post\" action=\"/login/login.php\"> 
               <span><input type=\"text\" class=\"login\" name=\"id\" id=\"client_id\" placeholder=\"ID\" onkeydown=\"javascript:if(event.keyCode==13)login();\">
            <input type=\"password\" class=\"login\" name=\"passwd\" id=\"client_passwd\" placeholder=\"PASSWORD\" onkeydown=\"javascript:if(event.keyCode==13)login();\">

        <button type=\"button\" class=\"button\" onclick=\"login()\">로그인</button></span>
        <span><input class=\"button\"type=\"button\" value=\"회원가입\" onclick=\"location.href='login/login_reg.php'\"></span></form>";
    }
    ?>




    <span style="text-align: center">
    사업자 등록 123468765321321
</span>

</body>
</html>