
attTableCidades();
attTableCidadesMei();

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
                            +"<td class = 'col-id''>"+cidades[index]['id']+"</td>"
                            +"<td class = 'col-nome''>"+cidades[index]['nome']+"</td>"
                            +"<td>"
                                +"<button onclick = 'cadastrarCidadeMei(this)'>Selecionar</button>"
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

function attTableCidadesMei(){
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
                            +"<td class = 'col-nome' ondblclick = 'editarTd(this)'>"+cidades[index]['cidade']['nome']+"</td>"
                            +"<td>"
                                +"<button class  ='excluir' onclick = 'excluirCidadeMei(this)'>Remover</button>"
                            +"</td>";
                        +"</tr>";
                 }
                 document.querySelector("#cidades-mei").innerHTML = conteudoTbl;
            }catch(e){
                document.querySelector("#cidades-mei").innerHTML = this.responseText;
                document.querySelector("#cidades-mei").innerHTML += e;
            }
        }
        
    };
    
    requisicao.open("GET","../../controller/buscarCidadesMei.php",true);
    requisicao.send();
}

function cadastrarCidadeMei(selecionar){
    document.querySelector(".feedback").innerHTML = "";
    let tr = selecionar.parentNode.parentNode;
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableCidadesMei();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }

    xhttp.open("GET","../../controller/cadastrarCidadeMei.php?id="+tr.querySelector(".col-id").innerHTML);
    xhttp.send();
}


function excluirCidadeMei(excluirBtn){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableCidadesMei();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = excluirBtn.parentNode.parentNode;
    xhttp.open("GET","../../controller/excluirCidadeMei.php?id="+tr.querySelector(".col-id").innerHTML);
    xhttp.send();
}