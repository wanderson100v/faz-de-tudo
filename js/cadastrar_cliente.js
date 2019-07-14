
hideFeedback();
$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    cadastroCliente();
});

function cadastroCliente()
{
    let erro = false;
    // tirando, se existir, o feedback de campo invalido da tela
    hideFeedback();
    $("#conSenha").removeClass("is-invalid");
    $("#cpfCnpj").removeClass("is-invalid");
    $("#nome").removeClass("is-invalid");
    // pegando dados da tela
    let cliente = { 
        login : $("#login").val().trim(),
        senha : $("#senha").val().trim(),
        conSenha : $("#conSenha").val().trim(),
        cpfCnpj : $("#cpfCnpj").val().trim(),
        nome : $("#nome").val().trim(),
        tipo : $("input[name='tipo']:checked").val(),
        nasc : null,
        sexo : null
    }

    if(cliente.login == "" || cliente.senha == "" || cliente.conSenha == "") // se algum campo dos dados de acesso não foi informado
    {
        $("#invf-dacess").show();
        erro = true;
    }
    else if(cliente.senha != cliente.conSenha) // se a senha e sua confirmação se diferir
    {
        $("#invf-senha").show();
        $("#conSenha").addClass("is-invalid");
        erro = true;
    }

    if(cliente.nome == ""){ // se o nome não foi informado
        $("#invf-nome").show();
        $("#nome").addClass("is-invalid");
        erro = true;
    }
    
    if(cliente.tipo == "Físico") // se jurídico esta marcado
    {
        cliente.nasc = $("#nasc").val();
        cliente.sexo = $("input[name='sexo']:checked").val();
        
        if(cliente.cpfCnpj == "") // se o CPF não foi informado
        {
            $("#invf-cpf").show();
            $("#cpfCnpj").addClass("is-invalid");
            erro = true;
        }
    }
    else // se não é jurídico é fisíco
    { 
        if(cliente.cpfCnpj == "")// se o CNPJ não foi informados
        {
            $("#invf-cnpj").show();
            $("#cpfCnpj").addClass("is-invalid");
            erro = true;
        }
    }
    if(!erro) // se não ocorreu erro
    {
        console.log("requisição POST AJAX para cadastro de cliente será enviada ao servidor");
        $.ajax(
        {
            url: base_url+"cliente/create",
            data: cliente ,
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
        });
    }
    else{
        console.log("cadastro de cliente não efetuado : existe feedbacks de erro visiveis em tela");
    }
       
}

function hideFeedback(){
   $("#invf-nome").hide();
   $("#invf-cpf").hide();
   $("#invf-cnpj").hide();
   $("#invf-senha").hide();
   $("#invf-dacess").hide();
   $(".feedback").hide();
}
