
hideFeedback();
$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    deletarUsuario();
});

function deletarUsuario()
{
    hideFeedback();
    $("#senha").removeClass("is-invalid");
    let adm = { 
        senha : $("#senha").val().trim(),
    }
   
    $.ajax(
    {
        url: base_url+"usuario/delete/1",
        data: adm ,
        type: "POST",
        dataType : "json", 
    })
    .done( function( json )
    {
        if(json['estado'] == "success"){
            window.location.href = base_url+"homepage/logar/1/5";
        }else{
            alerta = $(".feedback");
            alerta.html(json['msg']);
            alerta.removeClass();
            alerta.addClass("feedback alert alert-danger");
            alerta.show();
        }
    });
       
}

function hideFeedback(){
   $("#invf-senha").hide();
   $(".feedback").hide();
}
