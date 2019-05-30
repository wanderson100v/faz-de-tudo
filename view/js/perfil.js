
var requisicao = new XMLHttpRequest();
var cliente;

requisicao.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200){
        cliente = JSON.parse(this.responseText);
        showInfo();
    }
       
};

requisicao.open("GET","../../controller/buscarCliente.php",true);
requisicao.send();

function showInfo(){
    cancelEditUser();
    cancelEditCliente();
}

function showEditUser(){
    document.querySelector("#dados-acesso")
    .innerHTML = "<label for='loginId'>Nome de usuário*</label>"
                +"<input value = '"+cliente['usuario']['login']+"' type='text' name='loginFld' id='loginId'><br>"
                +"<label for='senhaId'>Senha*</label>"
                +"<input type='password' name='senhaFld' id='senhaId'><br>"
                +"<label for='conSenhaId'>Confirmar senha*</label>"
                +"<input type='password' name='conSenhaFld' id='conSenhaId'><br>";
}

function cancelEditUser(){
    document.querySelector("#dados-acesso")
    .innerHTML = "<span>Nome de usuário: "+cliente["usuario"]["login"]+"</span><br>"
                +"<span>Senha: *******</span><br>";
}

function saveEditUser(){
    
}

function showEditCliente(){
    if(cliente['tipo'] == 'Físico'){
        document.querySelector("#info-cliente")
        .innerHTML = '<fieldset>'
                        +'<legend>Tipo</legend>'
                        +'<label for="fisicoId">Físico</label>'
                        +'<input checked onclick="alterarFisico()" type="radio" name="tipoFld" value="Jurídico" id="fisicoId"><br>'
                        +'<label for="juridicoId">Jurídico</label>'
                        +'<input onclick="alterarJuridico()" type="radio" name="tipoFld" value="Físico" id="juridicoId"><br>'
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