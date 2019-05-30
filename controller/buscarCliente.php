<?php
use dao\ClienteDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $cliente = (new ClienteDao())->buscarUsuario($_SESSION['logado']);
    
    if(!empty($cliente)){
        echo json_encode(castObjectClassInArray($cliente));
    }else{
        "Nada encontrado!" ;       
    }
}else{
    "Usuário não está autenticado" ;
}