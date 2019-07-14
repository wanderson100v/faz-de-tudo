
hideFeedback();
$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    cadastrarMEI();
});

function cadastrarMEI()
{
    let erro = false;
    // tirando, se existir, o feedback de campo invalido da tela
    hideFeedback();
    $("#conSenha").removeClass("is-invalid");
    $("#cpfCnpj").removeClass("is-invalid");
    $("#nome").removeClass("is-invalid");
    $("#descContato").removeClass("is-invalid");

    // pegando dados da tela
    let mei = { 
        login : $("#login").val().trim(),
        senha : $("#senha").val().trim(),
        conSenha : $("#conSenha").val().trim(),
        cpfCnpj : $("#cpfCnpj").val().trim(),
        nome : $("#nome").val().trim(),
        tipo : "Físico",
        nasc : $("#nasc").val(),
        sexo : $("input[name='sexo']:checked").val(),
        tipoContato : $("input[name='tipoContato']:checked").val(),
        descContato : $("#descContato").val()
    }

    if(mei.login == "" || mei.senha == "" || mei.conSenha == "") // se algum campo dos dados de acesso não foi informado
    {
        $("#invf-dacess").show();
        erro = true;
    }
    else if(mei.senha != mei.conSenha) // se a senha e sua confirmação se diferir
    {
        $("#invf-senha").show();
        $("#conSenha").addClass("is-invalid");
        erro = true;
    }

    if(mei.nome == ""){ // se o nome não foi informado
        $("#invf-nome").show();
        $("#nome").addClass("is-invalid");
        erro = true;
    }

    if(mei.cpfCnpj == "") // se o CPF não foi informado
    {
        $("#invf-cpf").show();
        $("#cpfCnpj").addClass("is-invalid");
        erro = true;
    }

    if(mei.descContato == "")
    {
        $("#invf-descContato").show();
        $("#descContato").addClass("is-invalid");
        erro = true;
    }

    if(!erro) // se não ocorreu erro
    {
        console.log("requisição POST AJAX para cadastro de mei será enviada ao servidor");
        $.ajax(
        {
            url: base_url+"mei/create",
            data: mei ,
            type: "POST",
            dataType : "json", 
        })
        .done( function( json )
        {
            console.log("Resultado chegou "+json);
            alerta = $(".feedback");
            alerta.html(json['msg']);
            alerta.removeClass();
            alerta.addClass("feedback alert alert-"+json['estado']);
            alerta.show();
        })
        .fail(function( xhr, status, errorThrown ) {
            alert( "Sorry, there was a problem!" );
            console.log( "Error: " + errorThrown );
            console.log( "Status: " + status );
            console.dir( xhr );
        });
    }
    else{
        console.log("cadastro de mei não efetuado : existe feedbacks de erro visiveis em tela");
    }
       
}

function hideFeedback(){
   $("#invf-nome").hide();
   $("#invf-cpf").hide();
   $("#invf-cnpj").hide();
   $("#invf-senha").hide();
   $("#invf-dacess").hide();
   $("#invf-descContato").hide();
   $(".feedback").hide();
}
