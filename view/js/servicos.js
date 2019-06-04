
function initInfoServicos(){
    attTableServicos();
}

function attTableServicos(){
    let requisicao = new XMLHttpRequest();
    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            try{
                let servicos = JSON.parse(this.responseText);
                let conteudoTbl = "";
                for(let index in servicos) {
                    conteudoTbl+=
                        "<tr>"
                            +"<td class = 'col-id' ondblclick = 'editarTd(this)'>"+servicos[index]['id']+"</td>"
                            +"<td class = 'col-horas' ondblclick = 'editarTd(this)'>"+servicos[index]['horas']+"</td>"
                            +"<td class = 'col-valor' ondblclick = 'editarTd(this)'>"+servicos[index]['valor']+"</td>"
                            +"<td class = 'col-desc' ondblclick = 'editarTd(this)'>"+servicos[index]['descricao']+"</td>"
                            +"<td>"
                                +"<button class  ='editar' onclick = 'editarServico(this)'>Editar</button>"
                                +"<button class  ='excluir' onclick = 'excluirServico(this)'>Excluir</button>"
                            +"</td>";
                        +"</tr>";
                 }
                 document.querySelector("#servicos").innerHTML = conteudoTbl;
            }catch(e){
                document.querySelector("#servicos").innerHTML = this.responseText;
                document.querySelector("#servicos").innerHTML += e;
            }
        }
        
    };
    
    requisicao.open("GET","../../controller/buscarServicos.php",true);
    requisicao.send();
}

function cadastrarServico(){
    document.querySelector(".feedback").innerHTML = "";
    
    let valor = document.querySelector("#valorId").value.trim();
    let horas = document.querySelector("#horasId").value.trim();
    let descricao = document.querySelector("#descId").value.trim();

    if(valor == "" || horas == "" || descricao == ""){
        document.querySelector(".feedback").innerHTML ="*Um ou mais campos informados estão vazios";
        return;
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableServicos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }

    xhttp.open("GET","../../controller/cadastrarServico.php?valor="+valor+"&horas="+horas+"&descricao="+descricao);
    xhttp.send();
}


function excluirServico(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableServicos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/excluirServico.php?id="+tr.querySelector(".col-id").innerHTML);
    xhttp.send();
}


function editarServico(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableServicos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/editarServico.php?"
        +"id="+getValue(tr.querySelector(".col-id"))
        +"&valor="+getValue(tr.querySelector(".col-valor"))
        +"&horas="+getValue(tr.querySelector(".col-horas"))
        +"&descricao="+getValue(tr.querySelector(".col-desc"))
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