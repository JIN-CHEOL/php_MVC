function isNull(object){
    var res = false;
    if(object.val() == undefined || object.is(null) ||  object.val() == '' || object.val().length == 0){
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