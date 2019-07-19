function selecionarCidade(id){
    
    let cidadeMei = { 
        cidade_id : id
    }
  
    $.ajax(
    {
        url: base_url+"meiCidade/create",
        data: cidadeMei,
        type: "POST",
        dataType : "json"
    })
    .done( function( json )
    {
        mostrarResultado(json);
    });
}

function removerCidade(cidadeMei_id){
   
    let cidadeMei = { 
        id : cidadeMei_id
    }

    $.ajax(
    {
        url: base_url+"meiCidade/delete",
        data: cidadeMei,
        type: "POST",
        dataType : "json"
    })
    .done( function( json )
    {
        mostrarResultado(json);
    });
}