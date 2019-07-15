$(function(){
    if($("input[name='tipo']:checked").val() == "Físico"){
        alterarFisico();
    }else{
        alterarJuridico();
    }
});

function alterarFisico(){
    document.querySelector("label[for='cpfCnpj']").innerHTML = "CPF*";
    document.querySelector("label[for='nasc']").style.display ="initial";
    document.querySelector("#nasc").style.display ="initial";
    document.querySelector("#sexoFs").style.display ="initial";
}

function alterarJuridico(){  
    document.querySelector("label[for='cpfCnpj']").innerHTML = "CNPJ*";
    document.querySelector("label[for='nasc']").style.display ="none";
    document.querySelector("#nasc").style.display ="none";
    document.querySelector("#sexoFs").style.display ="none";
}