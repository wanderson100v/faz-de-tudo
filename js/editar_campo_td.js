

function editarTd(td){
    let input = td.querySelector("input")
    if(input != null)
        td.innerHTML = input.placeholder;
    else
        td.innerHTML = "<input type = 'text' placeholder = '"+td.innerHTML+"' value = '"+td.innerHTML+"' >";
}

function editarRow(td,url){
    let tr = td.parentNode.parentNode;
    window.location = url+"/"+getValue(tr.querySelector('.col-nome'))
    +"/"+getValue(tr.querySelector('.col-preco'))
    +"/"+getValue(tr.querySelector('.col-qtd'));
}

function getValue(td){
    let input = td.querySelector("input")
    if(input != null){
        console.log("Há input: "+ td.innerHTML);
        return input.value.replace("R$","").replace(",",".");
    }else{
        console.log("Não Há input");
        return td.innerHTML.replace("R$","").replace(",",".");
    }
}