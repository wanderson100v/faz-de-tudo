<?php
use dao\ServicoMeiDao;
use entity\ServicoMei;

require_once '../Config.php';

if(isset($_SESSION['logado'])){
    $servico = new ServicoMei();
    $servico->setId($_GET['id']);
    echo (new ServicoMeiDao)->delete($servico);
}else{
    echo "Usuário não está autenticado" ;
}