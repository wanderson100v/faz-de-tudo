<?php
use dao\ServicoDao;
use entity\Servico;

require_once '../Config.php';

if(isset($_SESSION['logado'])){
    $servico = new Servico();
    $servico->setId($_GET['id']);
    echo (new ServicoDao)->delete($servico);
}else{
    echo "Usuário não está autenticado" ;
}