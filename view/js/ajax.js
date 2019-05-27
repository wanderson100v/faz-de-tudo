
function logar(){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = "https://www.google.com";
        }
    };
    xhttp.open("GET", "../login.php?login="+document.querySelector("#loginId").value+"&senha="+document.querySelector("#senhaId").value, true);
    xhttp.send();
}