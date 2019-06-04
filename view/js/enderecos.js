

function initInfoEnderecos(){
    attTableEnderecos();
}

function attTableEnderecos(){
    let requisicao = new XMLHttpRequest();
    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            try{
                let enderecos = JSON.parse(this.responseText);
                let conteudoTbl = "";
                for(let index in enderecos) {
                    conteudoTbl+=
                        "<tr>"
                            +"<td class = 'col-id' ondblclick = 'editarTd(this)'>"+enderecos[index]['id']+"</td>"
                            +"<td class = 'col-cep' ondblclick = 'editarTd(this)'>"+enderecos[index]['cep']+"</td>"
                            +"<td class = 'col-num' ondblclick = 'editarTd(this)'>"+enderecos[index]['num']+"</td>"
                            +"<td class = 'col-logra' ondblclick = 'editarTd(this)'>"+enderecos[index]['logradouro']+"</td>"
                            +"<td class = 'col-bairro' ondblclick = 'editarTd(this)'>"+enderecos[index]['bairro']+"</td>"
                            +"<td class = 'col-cidade' ondblclick = 'editarTd(this)'>"+enderecos[index]['cidade']+"</td>"
                            +"<td class = 'col-estado' ondblclick = 'editarTd(this)'>"+enderecos[index]['estado']+"</td>"
                            +"<td class = 'col-pais' ondblclick = 'editarTd(this)'>"+enderecos[index]['pais']+"</td>"
                            +"<td>"
                                +"<button class  ='editar' onclick = 'editarEndereco(this)'>Editar</button>"
                                +"<button class  ='excluir' onclick = 'excluirEndereco(this)'>Excluir</button>"
                            +"</td>";
                        +"</tr>";
                 }
                 document.querySelector("#enderecos").innerHTML = conteudoTbl;
            }catch(e){
                document.querySelector("#enderecos").innerHTML = this.responseText;
                document.querySelector("#enderecos").innerHTML += e;
            }
        }
        
    };
    
    requisicao.open("GET","../../controller/buscarEnderecos.php",true);
    requisicao.send();
}

function cadastrarEndereco(){
    document.querySelector(".feedback").innerHTML = "";
    let cep = document.querySelector('#cepId').value.trim();
    let num = document.querySelector('#numId').value.trim();
    let logra = document.querySelector('#logrId').value.trim();
    let bairro = document.querySelector('#bairroId').value.trim();
    let cidade = document.querySelector('#cidadeId').value.trim();
    let estado = document.querySelector('#estadoId').value.trim();
    let pais = document.querySelector('#paisId').value.trim();

    var campos = [cep,num,logra,bairro,cidade,estado,pais];
    for(let i in campos){
        console.log("valor campo = "+campos[i]);
        if(campos[i] == ""){
            document.querySelector(".feedback").innerHTML = "*um ou mais campos de endereço vazios";
            return;
        }
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableEnderecos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }

    xhttp.open("GET","../../controller/cadastrarEndereco.php?cep="+cep+"&num="+num+"&bairro="
        +bairro+"&logradouro="+logra+"&cidade="+cidade+"&estado="+estado+"&pais="+pais);
    xhttp.send();
}


function excluirEndereco(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableEnderecos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/excluirEndereco.php?id="+tr.querySelector(".col-id").innerHTML);
    xhttp.send();
}


function editarEndereco(botao){
    document.querySelector(".feedback").innerHTML = "";

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
                attTableEnderecos();
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }
    let tr = botao.parentNode.parentNode;
    xhttp.open("GET","../../controller/editarEndereco.php?"
        +"id="+getValue(tr.querySelector(".col-id"))
        +"&cep="+getValue(tr.querySelector(".col-cep"))
        +"&num="+getValue(tr.querySelector(".col-num"))
        +"&logradouro="+getValue(tr.querySelector(".col-logra"))
        +"&bairro="+getValue(tr.querySelector(".col-bairro"))
        +"&cidade="+getValue(tr.querySelector(".col-cidade"))
        +"&estado="+getValue(tr.querySelector(".col-estado"))
        +"&pais="+getValue(tr.querySelector(".col-pais"))
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