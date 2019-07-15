
function excluirEndereco(id){
    $.ajax(
        {
            url: base_url+"endereco/delete/"+id,
            type: "POST",
            dataType : "json", 
        })
        .done( function( json )
        {
            alerta = $(".feedback");
            alerta.html(json['msg']);
            alerta.removeClass();
            alerta.addClass("feedback col-2 alert alert-"+json['estado']);
            alerta.fadeIn();
            setTimeout(function() {window.location.reload();}, 3000);
        });

}

function excluirContato(id){
    $.ajax(
        {
            url: base_url+"contato/delete/"+id,
            type: "POST",
            dataType : "json", 
        })
        .done( function( json )
        {
            alerta = $(".feedback");
            alerta.html(json['msg']);
            alerta.removeClass();
            alerta.addClass("feedback col-2 alert alert-"+json['estado']);
            alerta.fadeIn();
            setTimeout(function() {window.location.reload();}, 3000);
        })
        .fail(function (jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR); 
            console.log(textStatus); 
            console.log(errorThrown); 
        });
}

function editarContato(td, id){
    let tr = td.parentNode.parentNode;
}

function editarEndereco(td, id){
    let tr = td.parentNode.parentNode;
}