

function initInfoContatos(){
    attTableContatos();
}

function attTableContatos(s){
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
    
    requisicao.open("GET","../../controller/buscarContatos.php",true);
    requisicao.send();
}