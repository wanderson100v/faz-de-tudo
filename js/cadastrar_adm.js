
hideFeedback();
$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    cadastroAdm();
});

function cadastroAdm()
{
    let erro = false;
    // tirando, se existir, o feedback de campo invalido da tela
    hideFeedback();
    $("#conSenha").removeClass("is-invalid");
    $("#cpfCnpj").removeClass("is-invalid");
    $("#nome").removeClass("is-invalid");
    $("#grau_acesso").removeClass("is-invalid");
    // pegando dados da tela
    
    let adm = { 
        login : $("#login").val().trim(),
        senha : $("#senha").val().trim(),
        conSenha : $("#conSenha").val().trim(),
        grau_acesso : $("#grau_acesso option:selected").val()
    }

    if(adm.login == "" || adm.senha == "" || adm.conSenha == "") // se algum campo dos dados de acesso não foi informado
    {
        $("#invf-dacess").show();
        erro = true;
    }
    else if(adm.senha != adm.conSenha) // se a senha e sua confirmação se diferir
    {
        $("#invf-senha").show();
        $("#conSenha").addClass("is-invalid");
        erro = true;
    }

    if(adm.grau_acesso == ""){ // se o nome não foi informado
        $("#invf-grau_acesso").show();
        $("#grau_acesso").addClass("is-invalid");
        erro = true;
    }
  
    if(!erro) // se não ocorreu erro
    {
        console.log("requisição POST AJAX para cadastro de adm será enviada ao servidor");
        $.ajax(
        {
            url: base_url+"adm/create/1",
            data: adm ,
            type: "POST",
            dataType : "json", 
        })
        .done( function( json )
        {
            if(json['estado'] == "success")
                window.location.reload();
            alerta = $(".feedback");
            alerta.html(json['msg']);
            alerta.removeClass();
            alerta.addClass("feedback alert alert-"+json['estado']);
            alerta.show();
        });
    }
    else{
        console.log("cadastro de adm não efetuado : existe feedbacks de erro visiveis em tela");
    }
       
}

function hideFeedback(){
   $("#invf-senha").hide();
   $("#invf-dacess").hide();
   $("#invf-grau_acesso").hide();
   $(".feedback").hide();
}
