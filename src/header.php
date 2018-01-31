<!DOCTYPE html>
<link rel="stylesheet" href="/resource/css/style_.css">
<script src="/resource/js/jquery-3.2.1.min.js"></script>
<script src="/resource/js/common_util.js"></script>

<script type="text/javascript">
    function logout() {
        location.replace("/login/logout.php");

    }
    function login(){
        location.replace("/login/login.php");

    }
</script>

<style>
    span
    {
        height: 98%;
        width:35%;
        padding:10px 0 0 10px;
    }
</style>

    <span>
        <a href="/" class="header_logo"> test homepage</a>
    </span>

    <span class="header_login_form">

    <?php
    if($param->session('client')!=null){
        echo "<button id='logout' class=\"header_button\" type='button' onclick='logout();'>logout</button>";
    }else{
        echo " <input class=\"header_button\" type=\"button\" value=\"로그인\" onclick=\"location.href='/login/login.php'\">
                <input class=\"header_button\" type=\"button\" value=\"회원가입\" onclick=\"location.href='/login/login_reg.php'\">";
    }
    ?>

    </span>

