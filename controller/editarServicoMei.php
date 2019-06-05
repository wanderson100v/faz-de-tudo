<?php
use dao\ServicoMeiDao;
use entity\ServicoMei;

require_once '../Config.php';

if(isset($_SESSION['logado'])){

    $servicoMeiDao = new ServicoMeiDao();
    $servicoMei = $servicoMeiDao->readId($_GET['id']);
    $servicoMei->setHoras($_GET['horas']);
    $servicoMei->setValor($_GET['valor']);
    echo $servicoMeiDao->update($servicoMei);
}else{
    echo "Usuário não está autenticado" ;
}