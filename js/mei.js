
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
    if(document.querySelector("#fisicoId").checked)
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
    let tipoContato;
    let descContato;
    if(cadastro == "mei"){
        tipoContato = (document.querySelector("#telefoneId").checked)?
            document.querySelector("#telefoneId").value : document.querySelector("#emailId").value;
        descContato = document.querySelector("#descConatoId").value;
    }

    if(descContato == ""){
        erro +="*Nehuma descrição para o contato foi informada";
    }

    if(erro != "Alerta: ")
        document.querySelector(".feedback").innerHTML = erro;
    else{
    	let xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               try{
                    let textoRetorno ="";
                    let msgs = JSON.parse(this.responseText);
                    for(let linha in msgs){
                        let msg = msgs[''+linha+'']
                        if(msg != null){
                            if(msg.includes("Sucesso"))
                                textoRetorno +=  "<span class = 'feedback-sucess'>"+msg+"</span><br>";
                            else
                                textoRetorno +=  msg+"<br>";
                        }
                       
                    }
                    document.querySelector(".feedback").innerHTML = textoRetorno;
                }catch(e){
                   console.log("erro ao cadastrar "+cadastro);
                }
	        }
	    };
	    xhttp.open("POST", "../../controller/cClienteMei.php", true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        if(cadastro == "mei"){
            xhttp.send("cadastro="+cadastro+"&login="+login+"&senha="+senha+"&tipo="+tipo
                    +"&nome="+nome+"&cpfCnpj="+cpfCnpj+"&nasc="+nasc+"&sexo="+sexo
                    +"&tipoContato="+tipoContato+"&descContato="+descContato);
        }else{
            xhttp.send("cadastro="+cadastro+"&login="+login+"&senha="+senha+"&tipo="+tipo
                    +"&nome="+nome+"&cpfCnpj="+cpfCnpj+"&nasc="+nasc+"&sexo="+sexo);
        }
    }
}