<?php
use dao\MeiCidadeDao;
use dao\MeiDao;
use dao\CidadeDao;
use entity\MeiCidade;
use entity\Mei;
use entity\Cidade;

require_once '../Config.php';

if(isset($_SESSION['logado']))
{    
    $mei = (new MeiDao)->buscarUsuario($_SESSION['logado']);
    $cidade =(new CidadeDao)->readId($_GET['id']);
    $cidadeMei = new MeiCidade();
    $cidadeMei->setCidade($cidade);
    $cidadeMei->setMei($mei);
    $meiCidadeDao = new MeiCidadeDao();
    if(!$meiCidadeDao->buscarMeiCidade($mei->getId(), $cidade->getId()))
        echo $meiCidadeDao->create($cidadeMei);
    else
        echo "Cidade Já adicionada";
    
}else{
    echo "Usuário não está autenticado" ;
}