function isNull(object){
    var res = false;
    if(object.val() == undefined || object.is(null) ||  object.val() == '' || object.val().length == 0){
        object.focus();
        res = true;
    }
    return res;
}

function CommonForm(id){
    this.id = id
    var $form = $("<form id='"+id+"' method='post'></form>");
    $form.appendTo('body');
    this.setUrl = function(url){
        $('#'+this.id).attr('action',url);
    }
    this.addParam = function(name,value){
        $('#'+this.id).append("<input type='hidden' name='"+name+"' value='"+value+"'>");
    }
    this.submit = function(){
        $('#'+this.id).submit();
    }
}

function checkID(id){
    var idVal = id.val();
    var idReg = /^[a-z]+[a-z0-9]{5,19}$/g;
    var res = false;
    if(!idReg.test(idVal)){
        alert("ID는 영문자로 시작하는 6~20자 영문자 또는 숫자이어야 합니다.");
        id.focus();
        res = true;
    }
    return res;
}
function checkPASS(pass1,pass2){
    var passVal1 = pass1.val();
    var passVal2 = pass2.val();
    var passReg = /^.*(?=.{8,20})(?=.*[0-9])(?=.*[a-zA-Z]).*$/;
    var res = false;
    if(passVal1 != passVal2){
        alert("비밀번호가 동일하지않습니다.");
        pass1.focus();
        res = true;
    }

    if(!passReg.test(passVal1)){
        alert("비밀번호를 확인하세요.\n(영문,숫자를 혼합하여 6~20자 이내)");
        pass1.focus();
        res = true;
    }
    return res
}
function common_init(){
    $('.onlyKor').keydown(function(){
        return is_val('han',event,this);
    });
    $('.onlyNum').keydown(function(e){
        e = window.event || e || e.which;
        if(e.ctrlKey && e.keyCode == 8){
            return;
        }
        var inputVal = $(this).val();
        $(this).val(inputVal.replace(/[^0-9]/gi,''));
    })
    //reflash
    if(false) {
        $("*").keydown(function (e) {
            e = window.event || e || e.which;
            if (
                (e.ctrlKey &&e.keyCode == 8)  //back
                || e.keyCode == 116    //F5
                || e.keyCode == 112    // F1 new
                || (e.ctrlKey && e.keyCode == 82) // ctrl+R
                || (e.ctrlKey && e.keyCode == 78) // ctrl + n
                || (e.shiftKey && e.keyCode == 121) //shift+F10
            ) {
                e.keyCode = 0;
                return false;
            }
        });
    }
    //right mouse
    if(false){
        $(document).on("contextmenu",function(e){return false;});
    }
}
function fnGetEvent(e) {
    if (navigator.appName == 'Netscape') {
        keyVal = e.which;   //Netscape, CHROME
    } else if (navigator.appName == 'Microsoft Internet Explorer'){
        keyVal = e.keyCode ;   //MS
    }
    else{
        keyVal = e.which ;   //OPERA
    }
    return keyVal;
}
//key 값 체크 함수 -Type: han,eng,no

var k= new Array();
k= [8,9,13,16, 17, 18, 20,35,36,37,38,39,40,46, 112,113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123];

function is_val(type, e, obj){
    keyVal=fnGetEvent(e);
    for (i=0; i<k.length; i++)
    {
        if( keyVal == k[i]) return true;
    }
    if(type=="han") {
        if( keyVal==229 || keyVal==197) return true;
        else return false;
    }
    else if(type=="eng"){
        if( 65 <= keyVal && keyVal <=90) return true;
        else return false;
    }
    else if(type=="haneng"){
        if( 65 <= keyVal && keyVal <=90 || keyVal==229 || keyVal==197) return true;
        else return false;
    }
    else if(type=="no"){
        if( (48 <= keyVal && keyVal <=57) || ( 96<=keyVal && keyVal <=105 ) ) return true;
        else return false;
    }
    else if(type=="engNo"){
        if (is_val("eng", e, obj) )return true;
        else if( is_val("no",e, obj) )  return true;
        alert("영어와 숫자만 입력이 가능합니다.");
        return false;
    }
}
function fileDonwload(filePath){
    $.fileDownload('/Download.html?filePath='+filePath)
    .done(function(){alert('다운로드 성공');})
    .fail(function(){alert('다운로드 실패');});
    return false;
}
