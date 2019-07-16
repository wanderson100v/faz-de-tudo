var alerta;

$(function(){
    alerta = $(".feedback");
});

function mostrarResultado(json){
    
    if(json['estado'] == 'success')
        window.location.reload();
    else
        showMsg(json['msg']);

}

function showMsg(msg){
    alerta.html(msg);
    alerta.removeClass();
    alerta.addClass("feedback alert alert-danger");
    alerta.fadeIn().delay(1000).fadeOut();
}