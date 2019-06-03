<?php

use dao\ClienteDao;
use dao\AdmDao;
use entity\Usuario;

require_once '../Config.php';

if(isset($_SESSION['logado'])){
    $usuario = new Usuario();
    $usuario->setId($_POST["id"]);
    $usuario->setAtivo($_POST["ativo"]);
    $usuario->setLogin($_POST["login"]);
    $usuario->setSenha($_POST["senha"]);
    
    $dao = null;
    if($_SESSION['tipo']!='adm'){
        $dao = new ClienteDao();
    }else{
        $dao = new AdmDao();  
    }
    $usuarioBuscado = $dao->buscarUsuario($_SESSION['logado']);
    if(!empty($usuarioBuscado)){
            $usuarioBuscado->setUsuario($usuario);
            $dao->update($usuarioBuscado);
            session_destroy();
    }else{
        echo "Erro ao editar usuário!" ;       
    }
}else{
    echo "Usuário não está autenticado" ;
}