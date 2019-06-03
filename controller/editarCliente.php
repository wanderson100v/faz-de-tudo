<?php

use dao\ClienteDao;
use business\ClienteBo;

require_once '../Config.php';

if(isset($_SESSION['logado'])){
    $clienteDao = new ClienteDao();
    $cliente = $clienteDao->buscarUsuario($_SESSION['logado']);
    $cliente->setId($_POST["id"]);
    $cliente->setTipo($_POST["tipo"]);
    $cliente->setNome($_POST["nome"]);
    $cliente->setCpfCnpj($_POST["cpfCnpj"]);
    $cliente->setNasc($_POST["nasc"]);
    $cliente->setSexo($_POST["sexo"]);
    
    if(!empty($cliente)){
        $clienteDao->update($cliente);
        echo "Dados de cliente editado com sucesso";
    }else{
        echo "Erro ao editar informações de cliente!" ;       
    }
}else{
    echo "Usuário não está autenticado" ;
}