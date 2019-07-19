hideFeedback();

$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    cadastraCidade();
});

function cadastraCidade(){
    
    let cidade = { 
        cidade : $("#cidade").val().trim(),
        estado : $("#estado").val().trim()
    }

    let erro = false;
    for (var prop in cidade) {
        if(cidade[prop] == "" )
        {
            $("#invf-"+prop).show();
            erro = true;
        }
    }
    if(!erro){
        $.ajax(
        {
            url: base_url+"cidade/create",
            data: cidade,
            type: "POST",
            dataType : "json", 
        })
        .done( function( json )
        {
            mostrarResultado(json);
        });
    }
}

function editarCidade(td, cidade_id){
    let tr = td.parentNode.parentNode;

    let cidade = { 
        nome : getValue(tr.querySelector(".td-nome")),
        id : cidade_id
    }

    for (var prop in cidade) {
        if(cidade[prop] == "" )
        {
            showMsg("Um campo informado esta vazio");
            return;
        }
    }

    $.ajax(
    {
        url: base_url+"cidade/update",
        data: cidade,
        type: "POST",
        dataType : "json", 
    })
    .done( function( json )
    {
       mostrarResultado(json);
    });
}

function excluirCidade(id){
    $.ajax(
        {
            url: base_url+"cidade/delete",
            type: "POST",
            data: {'id' : id},
            dataType : "json", 
        })
        .done( function( json )
        {
            mostrarResultado(json);
        });
}

function hideFeedback(){
    $("#invf-cidade").hide();
    $("#invf-estado").hide();
 }
 
 function limparCampos(){
    $("#cidade").val("");
    $("#estado").val("");
 }