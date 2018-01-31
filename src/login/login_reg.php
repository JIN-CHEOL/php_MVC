<link rel="stylesheet" href="../resource/css/style_.css">
<script src="../resource/js/jquery-3.2.1.min.js"></script>
<script src="../resource/js/common_util.js"></script>
<?php
    require_once "../param.php";
    $param = new param;

?>
    <style>
        #all{
            margin-left: 35%;
        }
        .input{
            width: 300px;
            height:50px;
            font-size: 15px;
            margin-bottom: 10px;
            float: right;
            padding-left:10px;
        }
        .join
        {
            font-size: 40px;
            text-align: center;

        }
        .yy{
            width: 100px;
            height:50px;
            margin-bottom: 10px;

        }
        .mm{
            width:91px;
            height:50px;
            margin-bottom: 10px;
        }
    </style>
    <body>
<div id="header">
    <?php
    include "../header.php";
    ?>
</div>
<script type="text/javascript">
    var confirmID = false;
    $(function(){
        common_init();
    });
    function idCheck(){
        var id = $('#id');
        if(isNull(id)){
            alert('ID를 입력해주세요.');
            return;
        }
        if(checkID(id))return;
        $.ajax({
            type : "POST",
            url : "/login/idCheck_ajax.php",
            cache : false,
            data:{id:id.val()},
            dataType : "json",
            success : function(data){
                if(data.F_CNT>0){
                    confirmID = false;
                    alert("사용 불가능한 아이디입니다.")
                }else if(data.F_CNT==0){
                    confirmID = true;
                    alert("사용가능한 아이디입니다.")
                }else{
                    alert("에러!!");
                }
            },
            error : function(){
                alert("통신 에러!!");
            }

        });
    }
    function join(){
        if(isNull($('#id'))){
            alert("아이디를 입력해주세요.");
            return;
        }
        if(checkID($('#id')))return;

        if(!confirmID){
            alert("아이디를 확인해주세요.");
            return;
        }
        if(isNull($('#passwd'))){
            alert("패스워드를 입력해주세요.");
            return;
        }
        if(isNull($('#passwd_check'))){
            alert("패스워드 확인을 입력해주세요.");
            return;
        }
        if(checkPASS($('#passwd'),$('#passwd_check')))return;

        if(isNull($('#name'))){
            alert("이름을 입력해주세요.");
            return;
        }
        if(isNull($('#gender_M')) || isNull($('#gender_F'))){
            alert("성별을 선택해주세요.");
            return;
        }
        if(isNull($('#yy')) || isNull($('#mm')) || isNull($('#dd'))){
            alert("날짜를 입력해주세요.");
            return;
        }
        if(isNull($('#address'))){
            alert("주소를 입력해주세요.");
            return;
        }
        if(isNull($('#phone_num1')) || isNull($('#phone_num2')) || isNull($('#phone_num3'))) {
            alert("전화번호를 입력해주세요.");
            return;
        }
        var birth_day = $('#yy').val()+'-'+$('#mm').val()+'-'+$('#dd').val();
        $('#birth_day').val(birth_day);
        $('#joinForm').submit();
    }
</script>
<div id="center">
        <div id="all">
            <form id="joinForm" method="post" action="/login/login_reg_proc.php">
                <input type="hidden" name="birth_day" id="birth_day">
                <table>
                    <tr><td colspan="3" class="join">회원가입</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td colspan="2"><input class="" type="text" name="id" id="id" placeholder="아이디" onkeydown="javascript:if(event.keyCode==13){idCheck();}else{confirmID=false;}"></td>
                        <td><button type="button" onclick="idCheck();">중복확인</button></td>
                    </tr>
                    <tr><td colspan="3"><input class="input" type="password" name="passwd" id="passwd"  placeholder="비밀번호"></td></tr>
                    <tr><td colspan="3"><input class="input" type="password" name="passwd_check" id="passwd_check"  placeholder="비밀번호 확인"></td></tr>
                    <tr><td colspan="3"><input class="input onlyKor" type="text" name="name" id="name" placeholder="이름"></td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="gender_M" value="0" checked><label for="gender_M">남자</label>
                            <input type="radio" name="gender" id="gender_F" value="1"><label for="gender_F">여자</label>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="yy onlyNum" type="text" maxlength="4" name="yy" id ="yy" placeholder="년(4자)" ></td>
                        <td><select class="mm" name="mm" id="mm" title="월">
                                <option value="">월</option>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                                <option value="6" >6</option>
                                <option value="7" >7</option>
                                <option value="8" >8</option>
                                <option value="9" >9</option>
                                <option value="10" >10</option>
                                <option value="11" >11</option>
                                <option value="12" >12</option>
                            </select>
                        </td>
                        <td><input class="yy onlyNum" name="dd" type="text"  id="dd"  maxlength="2" placeholder="일"> </td>
                    </tr>
                    <tr><td colspan="3"><input class="input" type="text" name="address" id="address"  placeholder="주소"></td></tr>
                    <tr>
                        <td><input class="yy onlyNum" type="text" name="phone_num1" id="phone_num1"></td>
                        <td><input class="yy onlyNum" type="text" name="phone_num2" id="phone_num2"></td>
                        <td><input class="yy onlyNum" type="text" name="phone_num3" id="phone_num3"></td>
                    </tr>
                    <tr><td colspan="3"><button class="input" type="button" onclick="join();">가입하기</button></td></tr>
                </table>
            </form>
        </div>
    </body>


