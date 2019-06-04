
function initiInfoCidades(){
    attTableCidades();
}

function attTableCidades(){
    let requisicao = new XMLHttpRequest();
    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            try{
                let cidades = JSON.parse(this.responseText);
                let conteudoTbl = "";
                for(let index in cidades) {
                    conteudoTbl+=
                        "<tr>"
                            +"<td class = 'col-id' ondblclick = 'editarTd(this)'>"+cidades[index]['id']+"</td>"
                            +"<td class = 'col-nome' ondblclick = 'editarTd(this)'>"+cidades[index]['nome']+"</td>"
                            +"<td>"
                                +"<button class  ='editar' onclick = 'editarCidade(this)'>Editar</button>"
                                +"<button class  ='excluir' onclick = 'excluirCidade(this)'>Excluir</button>"
                            +"</td>";
                        +"</tr>";
                 }
                 document.querySelector("#cidades").innerHTML = conteudoTbl;
            }catch(e){
                document.querySelector("#cidades").innerHTML = this.responseText;
                document.querySelector("#cidades").innerHTML += e;
            }
        }
        
    };
    
    requisicao.open("GET","../../controller/buscarCidades.php",true);
    requisicao.send();
}

function cadastrarCidade(){
    document.querySelector(".feedback").innerHTML = "";
    
    let nome = document.querySelector("#nomeId").value;

    if(nome == ""){
        document.querySelector(".feedback").innerHTML ="*Não foi informado um nome(cidade/estado) para cidade";
        return;
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableCidades();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }

    xhttp.open("GET","../../controller/cadastrarCidade.php?nome="+nome);
    xhttp.send();
}


function excluirCidade(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableCidades();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/excluirCidade.php?id="+tr.querySelector(".col-id").innerHTML);
    xhttp.send();
}


function editarCidade(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableCidades();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/editarCidade.php?"
        +"id="+getValue(tr.querySelector(".col-id"))
        +"&nome="+getValue(tr.querySelector(".col-nome"))
        );
    xhttp.send();
}

function editarTd(td){
    let input = td.querySelector("input")
    if(input != null)
        td.innerHTML = input.placeholder;
    else
        td.innerHTML = "<input type = 'text' placeholder = '"+td.innerHTML+"' value = '"+td.innerHTML+"' >";
}

function getValue(td){
    let input = td.querySelector("input")
    if(input != null){
        return input.value;
    }else{
        return td.innerHTML;
    }
}