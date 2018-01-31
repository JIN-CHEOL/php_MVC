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
<div id="center">
        <div id="all">
            <table>
                <tr><td colspan="3" class="join">회원가입</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td colspan="3"><input class="input" type="text" name="id" placeholder="아이디"></td></tr>
                <tr><td colspan="3"><input class="input" type="password" name="pw"  placeholder="비밀번호"></td></tr>
                <tr><td colspan="3"><input class="input" type="password" name="pw_check"  placeholder="비밀번호 확인"></td></tr>
                <tr><td colspan="3"><input class="input" type="text" name="name"  placeholder="이름"></td></tr>
                <tr>
                    <td><input class="yy" type="text" maxlength="4" name="yy" placeholder="년(4자)" ></td>
                    <td><select class="mm" name="mm" title="월">
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
                    <td><input class="yy" name="yy" type="text"  maxlength="4" placeholder="일"> </td>
                </tr>
                <tr><td colspan="3"><input class="input" type="text" name="address"  placeholder="주소"></td></tr>
                <tr><td colspan="3"><input class="input" type="text" name="phone"  placeholder="전화번호"></td></tr>
                <tr><td colspan="3"><button class="input" type="button" onclick="">가입하기</button></td></tr>
            </table>
        </div>
    </body>


