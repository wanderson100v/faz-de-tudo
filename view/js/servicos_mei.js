
attTableServicos();
attTableServicosMei();

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
                            +"<td class = 'col-id'>"+servicos[index]['id']+"</td>"
                            +"<td class = 'col-horas'>"+servicos[index]['horas']+"</td>"
                            +"<td class = 'col-valor'>"+servicos[index]['valor']+"</td>"
                            +"<td class = 'col-desc'>"+servicos[index]['descricao']+"</td>"
                            +"<td>"
                                +"<button onclick = 'cadastrarServicoMei(this)'>Selecionar</button>"
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

function attTableServicosMei(){
    let requisicao = new XMLHttpRequest();
    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            try{
                let servicos = JSON.parse(this.responseText);
                let conteudoTbl = "";
                for(let index in servicos) {
                    conteudoTbl+=
                        "<tr>"
                            +"<td class = 'col-id'>"+servicos[index]['id']+"</td>"
                            +"<td class = 'col-horas' ondblclick = 'editarTd(this)'>"+servicos[index]['horas']+"</td>"
                            +"<td class = 'col-valor'  ondblclick = 'editarTd(this)'>"+servicos[index]['valor']+"</td>"
                            +"<td class = 'col-desc'>"+servicos[index]["servico"]['descricao']+"</td>"
                            +"<td>"
                                +"<button class  ='editar' onclick = 'editarServicoMei(this)'>Editar</button>"
                                +"<button class  ='excluir' onclick = 'excluirServicoMei(this)'>Remover</button>"
                            +"</td>";
                        +"</tr>";
                 }
                 document.querySelector("#servicos-mei").innerHTML = conteudoTbl;
            }catch(e){
                document.querySelector("#servicos-mei").innerHTML = this.responseText;
                document.querySelector("#servicos-mei").innerHTML += e;
            }
        }
        
    };
    
    requisicao.open("GET","../../controller/buscarServicosMei.php",true);
    requisicao.send();
}

function cadastrarServicoMei(selecionar){
    document.querySelector(".feedback").innerHTML = "";
    let tr = selecionar.parentNode.parentNode;
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableServicosMei();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }

    xhttp.open("GET","../../controller/cadastrarServicoMei.php?id="+tr.querySelector(".col-id").innerHTML);
    xhttp.send();
}


function excluirServicoMei(excluirBtn){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableServicosMei();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = excluirBtn.parentNode.parentNode;
    xhttp.open("GET","../../controller/excluirServicoMei.php?id="+tr.querySelector(".col-id").innerHTML);
    xhttp.send();
}


function editarServicoMei(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableServicosMei();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/editarServicoMei.php?"
        +"id="+getValue(tr.querySelector(".col-id"))
        +"&valor="+getValue(tr.querySelector(".col-valor"))
        +"&horas="+getValue(tr.querySelector(".col-horas"))
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