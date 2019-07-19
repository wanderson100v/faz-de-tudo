function selecionarServico(id){
    
    let servicoMei = { 
        servico_id : id
    }
  
    $.ajax(
    {
        url: base_url+"servicoMei/create",
        data: servicoMei,
        type: "POST",
        dataType : "json"
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

function removerServicoMei(servicoMei_id){
   
    let servicoMei = { 
        id : servicoMei_id
    }

    $.ajax(
    {
        url: base_url+"servicoMei/delete",
        data: servicoMei,
        type: "POST",
        dataType : "json"
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

function editarServicoMei(td, servicoMei_id){
    let tr = td.parentNode.parentNode;
    let servicoMei = { 
        valor : getValue(tr.querySelector(".td-valor")),
        horas : getValue(tr.querySelector(".td-horas")), 
        id : servicoMei_id
    }

    $.ajax(
    {
        url: base_url+"servicoMei/update",
        data: servicoMei,
        type: "POST",
        dataType : "json"
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