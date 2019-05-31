
function cadastroClienteMei(cadastro){
    document.querySelector(".feedback").innerHTML = "";

    let erro = "Alerta: ";
    let login = document.querySelector("#loginId").value.trim();
    let senha = document.querySelector("#senhaId").value.trim();
    let conSenha = document.querySelector("#conSenhaId").value.trim();

    if(login == "" || senha == "" || conSenha == "")
        erro += "*Um ou mais campos para dados de acesso estão vazios<br>";
    else if(senha != conSenha)
        erro += "*A senha informada e sua confirmação são diferentes<br>";
    let nome = document.querySelector("#nomeId").value.trim();
    if(nome == "")
        erro += "*Um nome deve ser informado<br>";
    let tipo;
    let cpfCnpj = document.querySelector("#cpfCnpjId").value.trim();
    let nasc;
    let sexo;
    if(document.querySelector("#fisicoId").checked == true)
    {
        tipo = "Físico";
        nasc = document.querySelector("#nascId").value;
        
        let masc = document.querySelector("#mascId");
        let fem = document.querySelector("#femId");
        let outro = document.querySelector("#outroId");
        if(masc.checked)
            sexo = masc.value;
        else if(fem.checked)
            sexo = fem.value;
        else
            sexo = outro.value;
        if(cpfCnpj == "")
            erro+= "*CPF não informado<br>";
    }
    else
    {
        tipo = "Jurídico";
        if(cpfCnpj == "")
            erro+= "*CNPJ não informado<br>";
    }
    if(erro != "Alerta: ")
        document.querySelector(".feedback").innerHTML = erro;
    else{
    	let xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
               document.querySelector(".feedback").innerHTML = this.response;
	        }
	    };
	    xhttp.open("POST", "../../controller/cClienteMei.php", true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    xhttp.send("cadastro="+cadastro+"&login="+login+"&senha="+senha+"&tipo="+tipo
	    		+"&nome="+nome+"&cpfCnpj="+cpfCnpj+"&nasc="+nasc+"&sexo="+sexo);
	}
}

function alterarFisico(){
    document.querySelector("label[for='cpfCnpjId']").innerHTML = "CPF*";
    document.querySelector("label[for='nascId']").style.display ="initial";
    document.querySelector("#nascId").style.display ="initial";
    document.querySelector("#sexoFsID").style.display ="block";
}

function alterarJuridico(){  
    document.querySelector("label[for='cpfCnpjId']").innerHTML = "CNPJ*";
    document.querySelector("label[for='nascId']").style.display ="none";
    document.querySelector("#nascId").style.display ="none";
    document.querySelector("#sexoFsID").style.display ="none";
}