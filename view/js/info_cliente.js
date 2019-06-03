
var cliente;

function initInfoCliente(){
    let requisicao = new XMLHttpRequest();
    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            try{
                cliente = JSON.parse(this.responseText);
                cancelEditCliente();
            }catch(e){
                document.querySelector("#conteudo").innerHTML = "<span class = 'feedback'>"+this.responseText+"</span>";
                document.querySelector("#conteudo").innerHTML += e;
            }
        }
           
    };
    
    requisicao.open("GET","../../controller/buscarCliente.php",true);
    requisicao.send();
}

function showEditCliente(){
    document.querySelector("#info-cliente")
    .innerHTML = '<fieldset>'
                    +'<legend>Tipo</legend>'
                    +'<label for="fisicoId">Físico</label>'
                    +'<input  '+((cliente['tipo'] == "Físico")? 'checked': '')+' onclick="alterarFisico()" type="radio" name="tipoFld" value="Jurídico" id="fisicoId"><br>'
                    +'<label for="juridicoId">Jurídico</label>'
                    +'<input  '+((cliente['tipo'] == "Jurídico")? 'checked': '')+' onclick="alterarJuridico()" type="radio" name="tipoFld" value="Físico" id="juridicoId"><br>'
                +' </fieldset>'
                +'<label for="nomeId">Nome*</label>'
                +' <input value = "'+cliente['nome']+'" type="text" name="nomeFld" id ="nomeId"><br>'
                +' <label for="cpfCnpjId">CPF*</label>'
                +'<input value = "'+cliente['cpfCnpj']+'" type="text" name="cpfCnpjFld" id ="cpfCnpjId"><br>'
                +'<label for="nascId">Data de Nascimento</label><br>'
                +'<input value = "'+cliente['nasc']+'" type="date" name="nascFld" id="nascId">'
                +'<fieldset id = "sexoFsID">'
                    +'<legend>Sexo</legend>'
                    +'<label for="mascId">Masculino</label>'
                    +'<input '+((cliente['sexo'] == "M")? 'checked': '')+' type="radio" name="sexoFld" value="M" id="mascId"><br>'
                    +'<label for="femId">Feminino</label>'
                    +'<input '+((cliente['sexo'] == "F")? 'checked': '')+' type="radio" name="sexoFld" value="F" id="femId"><br>'
                    +'<label for="outroId">Outro</label>'
                    +'<input '+((cliente['sexo'] == "O")? 'checked': '')+' type="radio" name="sexoFld" value="O" id="outroId"><br>'
                +'</fieldset>';
    if(cliente['tipo']== "Físico"){
        alterarFisico();
    }else{
        alterarJuridico();
    }
}

function cancelEditCliente(){
    if(cliente['tipo'] == 'Físico'){
        document.querySelector("#info-cliente")
        .innerHTML = "<span>Tipo: "+cliente["tipo"]+"</span><br>"
                    +"<span>Nome: "+cliente["nome"]+"</span><br>"
                    +"<span>CPF: "+cliente["cpfCnpj"]+"</span><br>"
                    +"<span>Data de Nascimento: "+cliente["nasc"]+"</span><br>"
                    +"<span>Sexo: "+cliente["sexo"]+"</span><br>";
    }else{
        document.querySelector("#info-cliente")
        .innerHTML = "<span>Tipo: "+cliente["tipo"]+"</span><br>"
                    +"<span>Nome: "+cliente["nome"]+"</span><br>"
                    +"<span>CNPJ: "+cliente["cpfCnpj"]+"</span><br>";
    }
}

function saveEditCliente(){
    let erro = "Alerta: ";
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
                if(this.responseText == "Dados de cliente editado com sucesso"){
                    cliente['tipo'] = tipo;
                    cliente['nome'] =nome ;
                    cliente['cpfCnpj'] = cpfCnpj;
                    cliente['nasc'] = nasc;
                    cliente['sexo'] = sexo ;
                    cancelEditCliente(); 
                }
            }
        };
        xhttp.open("POST", "../../controller/editarCliente.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+cliente['id']+"&tipo="+tipo+"&nome="+nome+"&cpfCnpj="+cpfCnpj+"&nasc="+nasc+"&sexo="+sexo);
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