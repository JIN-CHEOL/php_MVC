<link rel="stylesheet" href="/style.css">



<html lang='ko'>

<body>
<form id="loginForm" method="post" action="/login/login.php">
<span>
    <input class="login" type="text" name="id"  placeholder="ID" id="client_id" onkeydown="javascript:if(event.keyCode==13)login();">
    <input  class="login" type="password" name="passwd"  placeholder="Password" id="client_passwd" onkeydown="javascript:if(event.keyCode==13)login();">

    <button type="button" class="button" onclick="">로그인</button>
</span>
    <span>
    <input class="button"type="button" value="회원가입" onclick="location.href='login/login_reg.php'">
</span>
    <span style="text-align: center">
    사업자 등록 123468765321321
</span>
</form>
</body>
</html>