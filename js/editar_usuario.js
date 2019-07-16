
hideFeedback();
$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    editarUsuario();
});

function editarUsuario()
{
    let erro = false;
    // tirando, se existir, o feedback de campo invalido da tela
    hideFeedback();
    $("#login").removeClass("is-invalid");
    $("#conSenha").removeClass("is-invalid");
    $("#senha").removeClass("is-invalid");
    // pegando dados da tela
    let usuario = { 
        login : $("#login").val().trim(),
        senha : $("#senha").val().trim(),
        novaSenha : $("#novaSenha").val().trim(),
        conSenha : $("#conSenha").val().trim(),
        id : $("#id").val()
    }

    if(usuario.login == "" ) 
    {
        $("#invf-login").show();
        $("#login").addClass("is-invalid");
        erro = true;
    }

    if(usuario.senha == "" ) 
    {
        $("#invf-senha").show();
        $("#senha").addClass("is-invalid");
        erro = true;
    }

    if(usuario.novaSenha != "" && usuario.novaSenha != usuario.conSenha) // se a senha e sua confirmação se diferir
    {
        $("#invf-con-senha").show();
        $("#conSenha").addClass("is-invalid");
        erro = true;
    }

    if(!erro) // se não ocorreu erro
    {
        $.ajax(
        {
            url: base_url+"usuario/update/1",
            data: usuario ,
            type: "POST",
            dataType : "json", 
        })
        .done( function( json )
        {
            if(json['estado'] == 'success')
                window.location.href = base_url+"homepage/logar/1/4";
            else{
                alerta = $(".feedback");
                alerta.html(json['msg']);
                alerta.removeClass();
                alerta.addClass("feedback alert alert-"+json['estado']);
                alerta.show();
            }
        });
    }       
}

function hideFeedback(){
   $("#invf-senha").hide();
   $("#invf-con-senha").hide();
   $("#invf-login").hide();
   $(".feedback").hide();
}
