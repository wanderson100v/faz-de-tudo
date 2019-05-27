<?php

use dao\AdmDao;
use dao\ClienteDao;
use dao\MeiDao;

require_once('Config.php');

$login = "wanderson100v";
$senha = "biscoito";


$admDao = new AdmDao();
$adm = $admDao->buscarUsuario($login, $senha);
if($adm === NULL){
    $meiDao = new MeiDao();
    $mei = $meiDao->buscarUsuario($login, $senha);
    if($mei === NULL){
        $clienteDao = new ClienteDao();
        $cliente = $clienteDao->buscarUsuario($login, $senha);
    }
}
if($adm != null){
    echo json_encode($adm);
}else if(isset($mei) && $mei != null){
    echo json_encode($mei);
}else if(isset($cliente) && $cliente != null){
    echo json_encode($cliente);
}
else
    echo "Dados de acesso invalidos.";