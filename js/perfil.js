var alerta;
var attTela;
$(function(){
    alerta = $(".feedback");
});

function excluirEndereco(id){
    $.ajax(
        {
            url: base_url+"endereco/delete",
            type: "POST",
            data: {'id' : id},
            dataType : "json", 
        })
        .done( function( json )
        {
            mostrarResultado(json);
        });
}

function excluirContato(id){
    $.ajax(
        {
            url: base_url+"contato/delete",
            type: "POST",
            data: {'id' : id},
            dataType : "json", 
        })
        .done( function( json )
        {
            mostrarResultado(json);
        })
        .fail(function (jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR); 
            console.log(textStatus); 
            console.log(errorThrown); 
        });
}

function editarContato(td, contato_id){
    let tr = td.parentNode.parentNode;

    let contato = { 
        descContato : getValue(tr.querySelector(".td-descricao")),
        id : contato_id
    }

    alert(contato.descContato);
    if(contato.descContato == "" ) 
    {
        alerta.html("A descrição do contato deve ser informado");
        alerta.fadeIn().dalay(1000).fadeOut();
        return;
    }

    $.ajax(
    {
        url: base_url+"contato/update/1",
        data: contato,
        type: "POST",
        dataType : "json", 
    })
    .done( function( json )
    {
       mostrarResultado(json);
       
    })
    .fail(function (jqXHR, textStatus, errorThrown) { 
        console.log(jqXHR); 
        console.log(textStatus); 
        console.log(errorThrown); 
    }); 
}

function editarEndereco(td, id){
    let tr = td.parentNode.parentNode;
}

function mostrarResultado(json){
    alerta.html(json['msg']);
    alerta.removeClass();
    alerta.addClass("feedback alert alert-"+json['estado']);
    setTimeout(function(){
       if(json['estado'] == 'success')
           window.location.reload();
       else
           alerta.fadeOut();
    }, 1000);
}