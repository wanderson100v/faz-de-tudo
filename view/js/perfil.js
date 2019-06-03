
function showInfoCliente(){
    var requisicao = new XMLHttpRequest();
    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.querySelector("#conteudo").innerHTML = this.responseText;
            initInfoCliente();
            requisicao = new XMLHttpRequest();
            requisicao.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200){
                    document.querySelector("#conteudo").innerHTML += this.responseText;
                    initInfoUser();
                }
            };
            requisicao.open("GET","../infoUsuario.php",true);
            requisicao.send();
        }
           
    };
    requisicao.open("GET","../infoCliente.php",true);
    requisicao.send();
}

function showInfoAdm(){
    var requisicao = new XMLHttpRequest();

    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.querySelector("#conteudo").innerHTML = this.responseText;
            initInfoUser();
        }
    };

    requisicao.open("GET","../infoUsuario.php",true);
    requisicao.send();
}

function showInfoEndereco(){
    var requisicao = new XMLHttpRequest();

    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.querySelector("#conteudo").innerHTML = this.responseText;
            initInfoEnderecos();
        }
           
    };

    requisicao.open("GET","../enderecos.php",true);
    requisicao.send();
}

function showInfoContato(){
    var requisicao = new XMLHttpRequest();

    requisicao.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.querySelector("#conteudo").innerHTML = this.responseText;
            initInfoContatos();
        }
           
    };

    requisicao.open("GET","../contatos.php",true);
    requisicao.send();
}