hideFeedback();

$("button[type='submit']")
.click(function( event ) {
    event.preventDefault();
    cadastrarServico();
});

function cadastrarServico(){
   
    let servico = { 
        valor : $("#valor").val().trim(),
        horas : $("#horas").val().trim(),
        descricao :$("#descricao").val().trim()
    }

    let erro = false;
    for (var prop in servico) {
        if(servico[prop] == "" )
        {
            $("#invf-"+prop).show();
            erro = true;
        }
    }

    if(!erro){
        $.ajax(
        {
            url: base_url+"servico/create",
            data: servico,
            type: "POST",
            dataType : "json", 
        })
        .done( function( json )
        {
        mostrarResultado(json);
        });
    }
}


function editarServico(td, servico_id){
    let tr = td.parentNode.parentNode;

    let servico = { 
        valor : getValue(tr.querySelector(".td-valor")),
        horas : getValue(tr.querySelector(".td-horas")),
        descricao : getValue(tr.querySelector(".td-descricao")),
        id : servico_id
    }

    for (var prop in servico) {
        if(servico[prop] == "" )
        {
            showMsg("Um campo informado esta vazio");
            return;
        }
    }

    $.ajax(
    {
        url: base_url+"servico/update",
        data: servico,
        type: "POST",
        dataType : "json", 
    })
    .done( function( json )
    {
       mostrarResultado(json);
    });
}

function excluirServico(id){
    $.ajax(
        {
            url: base_url+"servico/delete",
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
    $("#invf-horas").hide();
    $("#invf-valor").hide();
    $("#invf-descicao").hide();
 }
 
 function limparCampos(){
    $("#valor").val("");
    $("#horas").val("");
    $("#descicao").val("");
 }