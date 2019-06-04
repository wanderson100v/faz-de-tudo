
var usuario;

function initInfoUser(){
    let requisicao = new XMLHttpRequest();
   
    
    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            try{
                usuario = JSON.parse(this.response);
                cancelEditUser();
            }catch(e){
                document.querySelector("#conteudo").innerHTML = "<span class = 'feedback'>"+this.responseText+"</span>";
                document.querySelector("#conteudo").innerHTML += e;
            }
        }
           
    };
    requisicao.open("GET","../../controller/buscarUsuario.php",true);
    requisicao.send();
}

function showEditUser(){
    document.querySelector("#dados-acesso")
    .innerHTML = "<label for='loginId'>Nome de usuário*</label>"
                +"<input value = '"+usuario['login']+"' type='text' name='loginFld' id='loginId'><br>"
                +"<label for='senhaId'>Senha atual*</label>"
                +"<input type='password' name='senhaFld' id='senhaId'><br>"
                +"<label for='nsenhaId'>Nova senha*</label>"
                +"<input type='password' id='nsenhaId'><br>"
                +"<label for='conSenhaId'>Confirmar nova senha*</label>"
                +"<input type='password' name='conSenhaFld' id='conSenhaId'><br>";
}

function cancelEditUser(){
    document.querySelector("#dados-acesso")
    .innerHTML = "<span>Nome de usuário: "+usuario["login"]+"</span><br>"
                +"<span>Senha: *******</span><br>";
}

function saveEditUser(){
    document.querySelector(".feedback").innerHTML = "";

    let erro = "Alerta: ";
    let login = document.querySelector("#loginId").value.trim();
    let senhaAtual = document.querySelector("#senhaId").value.trim();
    let senhaNova = document.querySelector("#nsenhaId").value.trim();
    let senhaConNova = document.querySelector("#conSenhaId").value.trim();
    let editarSenha = senhaNova  != "";

    if(login == "")
        erro += "*Login em branco";
    if(editarSenha){
        if(usuario['senha'] != senhaAtual)
            erro += "*Senha atual incorreta<br>";
        if(senhaAtual == "" || senhaConNova == "")   
            erro += "*Nova senha foi informada, porém confirmação e senha atual estão vazios<br>";
        if(senhaNova != senhaConNova)
            erro += "*A nova senha senha informada e sua confirmação são diferentes<br>";
    }else
        senhaNova = usuario['senha'];
    if(erro != "Alerta: ")
        document.querySelector(".feedback").innerHTML = erro;
    else{
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".feedback").innerHTML = this.response;
                if(this.responseText.includes("Sucesso")){
                    usuario['login'] = login;
                    usuario['senha'] = senhaNova;
                    document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+" você será desconectado </span>";
                    setTimeout(function() {
                            window.location = "../../controller/logout.php";
                        },2000);
                }else{
                    document.querySelector(".feedback").innerHTML = this.responseText;
                }
            }
        };
        xhttp.open("POST", "../../controller/editarUsuario.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+usuario['id']+"&ativo="+usuario['ativo']+"&login="+login+"&senha="+senhaNova);
    }
}

function desativarUsuario(){
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "../../controller/desativarUsuario.php", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location = "/faz-de-tudo/index.html"
        }
    };
    xhttp.send();
}