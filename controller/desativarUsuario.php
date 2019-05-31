<?php

use dao\ClienteDao;

require_once '../Config.php';

if(isset($_SESSION['logado'])){    
    $clienteDao = new ClienteDao();
    $cliente = $clienteDao->buscarUsuario($_SESSION['logado']);
    if(!empty($cliente)){
        $cliente->getUsuario()->setAtivo(false);
        $clienteDao->update($cliente);
        session_destroy();
        echo "Usuário desativado com sucesso";
    }else{
        echo "Erro ao desativar usuário!" ;       
    }
}else{
    echo "Usuário não está autenticado" ;
}