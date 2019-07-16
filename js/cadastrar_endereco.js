
$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    cadastrarEndereco();
});

function cadastrarEndereco()
{
    let erro = false;
    $(".feedback").hide();
    // pegando dados da tela
    let endereco = { 
        cep : $("#cep").val().trim(),
        num : $("#num").val().trim(),
        logradouro : $("#logradouro").val().trim(),
        bairro : $("#bairro").val().trim(),
        cidade : $("#cidade").val().trim(),
        estado : $("#estado").val().trim(),
        pais : $("#pais").val().trim()
    }

    for (var prop in endereco) { // para cada propriedade do objeto endereço
        if(endereco[prop] == "" ) // mostrando erros
        {
            $("#invf-"+prop).show();
            $("#"+prop).addClass("is-invalid");
            erro = true;
        }else{ // removendo erros da tela
            $("#invf-"+prop).hide();
            $("#"+prop).removeClass("is-invalid");
        }
    }

    if(!erro) // se não ocorreu erro
    {
        $.ajax(
        {
            url: base_url+"endereco/create/1",
            data: endereco ,
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
        })
        .fail(function (jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR); 
            console.log(textStatus); 
            console.log(errorThrown); 
        });
    }       
}