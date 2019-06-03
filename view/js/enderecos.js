

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
                            +"<td>"+enderecos[index]['id']+"</td>"
                            +"<td>"+enderecos[index]['cep']+"</td>"
                            +"<td>"+enderecos[index]['num']+"</td>"
                            +"<td>"+enderecos[index]['logradouro']+"</td>"
                            +"<td>"+enderecos[index]['bairro']+"</td>"
                            +"<td>"+enderecos[index]['cidade']+"</td>"
                            +"<td>"+enderecos[index]['estado']+"</td>"
                            +"<td>"+enderecos[index]['pais']+"</td>"
                            +"<td>"
                                +"<button class  ='editar' onclick = 'editarEndereco()'>Editar</button>"
                                +"<button class  ='excluir' onclick = 'excliorEndereco()'>Excluir</button>"
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
    let cep = document.querySelector('#cepId').value.trim();
    let num = document.querySelector('#numId').value.trim();
    let logra = document.querySelector('#logrId').value.trim();
    let bairro = document.querySelector('#bairroId').value.trim();
    let cidade = document.querySelector('#cidadeId').value.trim();
    let estado = document.querySelector('#estadoId').value.trim();
    let pais = document.querySelector('#paisId').value.trim();

    var campos = [cep,num,logra,bairro,cidade,estado,pais];
    for(let campo in campos){
        if(campo == ""){
            document.querySelector("#feedback") = "*um ou mais campos de endereço vazios";
            return;
        }
    }
    document.querySelector("#feedback") = "*Sucesso ao Cadastrar";
    
}