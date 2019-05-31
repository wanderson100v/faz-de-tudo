<?php

use dao\ClienteDao;
use entity\Usuario;
use business\UsuarioBo;

require_once '../Config.php';

if(isset($_SESSION['logado'])){
    $usuario = new Usuario();
    $usuario->setId($_POST["id"]);
    $usuario->setAtivo($_POST["ativo"]);
    $usuario->setLogin($_POST["login"]);
    $usuario->setSenha($_POST["senha"]);
    
    $erro = (UsuarioBo::getInstance())->validar($usuario);
    if($erro == ""){
        $clienteDao = new ClienteDao();
        $cliente = $clienteDao->buscarUsuario($_SESSION['logado']);
        if(!empty($cliente)){
            $cliente->setUsuario($usuario);
            $clienteDao->update($cliente);
            
            echo "Usuário editado com sucesso";
        }else{
            echo "Erro ao editar usuário!" ;       
        }
    }else
        echo $erro;
}else{
    echo "Usuário não está autenticado" ;
}