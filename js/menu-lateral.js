var menuAtivado = false;
$("#menu").hide(500);

function auternarMenu(){
    if(menuAtivado){
        $("#perfil").removeClass("col-9");
        $("#perfil").addClass("col-12");
        $("#menu").hide(500);
        menuAtivado = false;
    }else{
        $("#menu").show(500);
        $("#perfil").removeClass("col-12");
        $("#perfil").addClass("col-9");
        menuAtivado = true;
    }
}