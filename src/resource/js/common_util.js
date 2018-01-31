function isNull(object){
    var res = false;
    if(object.val() == undefined || object.is(null) ||  object.val() == '' || object.val().length == 0){
        res = true;
    }
    return res;
}