<link rel="stylesheet" href="../resource/css/style_.css">
<script src="../resource/js/jquery-3.2.1.min.js"></script>
<script src="../resource/js/common_util.js"></script>
<?php
    require_once "../param.php";
    $param = new param;

?>


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
            <form id="joinForm" method="post" action="./login_reg_proc.php">
                <input type="hidden" name="birth_day" id="birth_day">
                <table class="login_table">
                    <tr>
                        <td colspan="2" class="login_td"><input class="input1 w200 h50" type="text" name="id" id="id" placeholder="아이디" onkeydown="javascript:if(event.keyCode==13){idCheck();}else{confirmID=false;}"></td>
                        <td class="login_td"><button type="button" class="button h50 w100 " onclick="idCheck();">중복확인</button></td>
                    </tr>
                    <tr><td class="login_td" colspan="3"><input class="input1 w300 h50" type="password" name="passwd" id="passwd"  placeholder="비밀번호"></td></tr>
                    <tr><td class="login_td" colspan="3"><input class="input1 w300 h50" type="password" name="passwd_check" id="passwd_check"  placeholder="비밀번호 확인"></td></tr>
                    <tr><td class="login_td" colspan="3"><input class="input1 w300 h50 onlyKor" type="text" name="name" id="name" placeholder="이름"></td></tr>
                    <tr>
                        <td  class="login_td" colspan="3">
                            <input type="radio" name="gender" id="gender_M" value="0" checked><label for="gender_M">남자</label>
                            <input type="radio" name="gender" id="gender_F" value="1"><label for="gender_F">여자</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="login_td"><input class="input1 w100 h50 onlyNum" type="text" maxlength="4" name="yy" id ="yy" placeholder="년(4자)" ></td>
                        <td class="login_td"><select class="input1 w100 h50" name="mm" id="mm" title="월">
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
                        <td class="login_td"><input class="input1 w100 h50" name="dd" type="text"  id="dd"  maxlength="2" placeholder="일"> </td>
                    </tr>
                    <tr><td class="login_td" colspan="3"><input class="input1 w300 h50" type="text" name="address" id="address"  placeholder="주소"></td></tr>
                    <tr>
                        <td class="login_td"><input class="input1 w100 h50 onlyNum" type="text" name="phone_num1" maxlength="3"placeholder="010" id="phone_num1"></td>
                        <td class="login_td"><input class="input1 w100 h50 onlyNum" type="text" name="phone_num2" maxlength="4" id="phone_num2"></td>
                        <td class="login_td"><input class="input1 w100 h50 onlyNum" type="text" name="phone_num3" maxlength="4" id="phone_num3"></td>
                    </tr>
                    <tr><td class="login_td" colspan="3"><button class="input w300 h50 button" type="button" onclick="join();">가입하기</button></td></tr>
                </table>
            </form>
        </div>
</div>


