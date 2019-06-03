<?php
use dao\ClienteDao;
use dao\AdmDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $dao;
    if($_SESSION['tipo'] == "adm")
    {
        $dao = new AdmDao();
    }
    else
    {
        $dao = new ClienteDao();
    }

    $tipo = $dao->buscarUsuario($_SESSION['logado']);
    if(!empty($tipo) && !empty($tipo->getUsuario()))
    {
        echo json_encode(castObjectClassInArray($tipo->getUsuario()),JSON_UNESCAPED_UNICODE);
    }
    else
    {
        echo "Nada encontrado!" ;   
    }
}else{
    echo "Usuário não está autenticado" ;
}