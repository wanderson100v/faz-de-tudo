<?php

use dao\MeiDao;
use dao\ServicoDao;
use dao\ServicoMeiDao;
use entity\Mei;
use entity\Servico;
use entity\ServicoMei;

require_once '../Config.php';

if(isset($_SESSION['logado']))
{    
    $mei = (new MeiDao)->buscarUsuario($_SESSION['logado']);
    $servico =(new ServicoDao)->readId($_GET['id']);
    $servicoMei = new ServicoMei();
    $servicoMei->setServico($servico);
    $servicoMei->setMei($mei);
    $servicoMei->setHoras($servico->getHoras());
    $servicoMei->setValor($servico->getValor());
    $servicoMeiDao = new ServicoMeiDao();
    $servicoMeiId = $servicoMeiDao->buscarPorServicoMei($mei->getId(), $servico->getId());
    if($servicoMeiId == 0)
        echo $servicoMeiDao->create($servicoMei);
    else{
        $servicoMei = $servicoMeiDao->readId($servicoMeiId);
        $servicoMei->setAtivo(true);
        echo $servicoMeiDao->update($servicoMei);
    }
       
    
}else{
    echo "Usuário não está autenticado" ;
}