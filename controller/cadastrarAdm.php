<?php
use dao\AdmDao;
use entity\Adm;
use entity\Usuario;

require_once '../Config.php';

if(isset($_SESSION['logado']))
{    
    $usuario = new Usuario();
    $usuario->setLogin($_POST['login']);
    $usuario->setSenha($_POST['senha']);
    
    $adm = new Adm();
    $adm->setGralAcesso($_POST['gralAcesso']);
    $adm->setUsuario($usuario);
    echo (new AdmDao())->create($adm);
}else{
    echo "Usuário não está autenticado" ;
}