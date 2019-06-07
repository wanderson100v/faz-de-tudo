
function initInfoContatos(){
    attTableContatos();
}

function attTableContatos(){
    let requisicao = new XMLHttpRequest();
    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            try{
                let contatos = JSON.parse(this.responseText);
                let conteudoTbl = "";
                for(let index in contatos) {
                    conteudoTbl+=
                        "<tr>"
                            +"<td class = 'col-id' ondblclick = 'editarTd(this)'>"+contatos[index]['id']+"</td>"
                            +"<td class = 'col-tipo' ondblclick = 'editarTd(this)'>"+contatos[index]['tipo']+"</td>"
                            +"<td class = 'col-desc' ondblclick = 'editarTd(this)'>"+contatos[index]['descricao']+"</td>"
                            +"<td>"
                                +"<button class  ='editar' onclick = 'editarContato(this)'>Editar</button>"
                                +"<button class  ='excluir' onclick = 'excluirContato(this)'>Excluir</button>"
                            +"</td>";
                        +"</tr>";
                 }
                 document.querySelector("#contatos").innerHTML = conteudoTbl;
            }catch(e){
                document.querySelector("#contatos").innerHTML = this.responseText;
                document.querySelector("#contatos").innerHTML += e;
            }
        }
        
    };
    
    requisicao.open("GET","../../controller/buscarContatos.php",true);
    requisicao.send();
}

function cadastrarContato(){
    document.querySelector(".feedback").innerHTML = "";
    
    tipoContato = (document.querySelector("#telefoneId").checked)?
        document.querySelector("#telefoneId").value : document.querySelector("#emailId").value;
    descContato = document.querySelector("#descConatoId").value;
    
    if(descContato == ""){
        document.querySelector(".feedback").innerHTML ="*Nehuma descrição para o contato foi informada";
        return;
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableContatos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }

    xhttp.open("GET","../../controller/cadastrarContato.php?tipo="+tipoContato+"&descricao="+descContato);
    xhttp.send();
}


function excluirContato(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableContatos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/excluirContato.php?id="+tr.querySelector(".col-id").innerHTML);
    xhttp.send();
}


function editarContato(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableContatos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/editarContato.php?"
        +"id="+getValue(tr.querySelector(".col-id"))
        +"&tipo="+getValue(tr.querySelector(".col-tipo"))
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