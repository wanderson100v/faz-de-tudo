
function logar(){
    document.querySelector(".feedback").innerHTML = "";
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           // window.location.href = "https://www.google.com";
           if(this.response.includes("Alerta")){
               document.querySelector(".feedback").innerHTML = this.response;
           }
        }
    };
    xhttp.open("POST", "../controller/login.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("login="+document.querySelector("#loginId").value+"&senha="+document.querySelector("#senhaId").value);
}