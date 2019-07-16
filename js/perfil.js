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

    if(contato.descContato == "" ) 
    {
        showMsg("A descrição do contato deve ser informado");
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
    }); 
}

function editarEndereco(td, endereco_id){
    let tr = td.parentNode.parentNode;

    let endereco = { 
        cep : getValue(tr.querySelector(".td-cep")),
        num : getValue(tr.querySelector(".td-num")),
        logradouro : getValue(tr.querySelector(".td-logradouro")),
        bairro :getValue(tr.querySelector(".td-bairro")),
        cidade : getValue(tr.querySelector(".td-cidade")),
        estado :getValue(tr.querySelector(".td-estado")),
        pais : getValue(tr.querySelector(".td-pais")),
        id : endereco_id
    }

    for (var prop in endereco) { // para cada propriedade do objeto endereço
        if(endereco[prop] == "" )
        {
            showMsg("Um campo informado esta vazio");
            return;
        }
    }

    $.ajax(
    {
        url: base_url+"endereco/update/1",
        data: endereco,
        type: "POST",
        dataType : "json", 
    })
    .done( function( json )
    {
       mostrarResultado(json);
    });
}