
hideFeedback();
$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    cadastrarContato();
});

function cadastrarContatos()
{
    let erro = false;
    // tirando, se existir, o feedback de campo invalido da tela
    hideFeedback();
    $("#descContato").removeClass("is-invalid");
    // pegando dados da tela
    let contato = { 
        tipoContato : $("input[name='tipoContato']:checked").val(),
        descContato : $("#descContato").val().trim()
    }

    if(contato.descContato == "" ) 
    {
        $("#invf-descContato").show();
        $("#descContato").addClass("is-invalid");
        erro = true;
    }

    if(!erro) // se não ocorreu erro
    {
        $.ajax(
        {
            url: base_url+"contato/create/1",
            data: contato ,
            type: "POST",
            dataType : "json", 
        })
        .done( function( json )
        {
            alerta = $(".feedback");
            alerta.html(json['msg']);
            alerta.removeClass();
            alerta.addClass("feedback alert alert-"+json['estado']);
            alerta.show();
            sleep(3000);
            alerta.hide();
        })
        .fail(function (jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR); 
            console.log(textStatus); 
            console.log(errorThrown); 
        });
    }       
}

function hideFeedback(){
   $("#invf-descContato").hide();
   $(".feedback").hide();
}
