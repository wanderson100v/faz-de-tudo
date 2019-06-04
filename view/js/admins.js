function cadastrarAdm(){
    document.querySelector(".feedback").innerHTML = "";

    let erro = "Alerta: ";
    let login = document.querySelector("#loginId").value.trim();
    let senha = document.querySelector("#senhaId").value.trim();
    let conSenha = document.querySelector("#conSenhaId").value.trim();

    if(login == "" || senha == "" || conSenha == "")
        erro += "*Um ou mais campos para dados de acesso estão vazios<br>";
    else if(senha != conSenha)
        erro += "*A senha informada e sua confirmação são diferentes<br>";

    if(erro != "Alerta: "){
        document.querySelector(".feedback").innerHTML = erro;
        return;
    }
    
    let gralAcesso = document.querySelector("#gral-acessoId").value;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText.includes("Sucesso")){
                document.querySelector(".feedback").innerHTML = "<span class = 'feedback-sucess'>"+this.responseText+"</span>";
            }else{
                document.querySelector(".feedback").innerHTML = this.responseText;
            }
        }
    }

    xhttp.open("POST","../../controller/cadastrarAdm.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("login="+login+"&senha="+senha+"&gralAcesso="+gralAcesso);
}