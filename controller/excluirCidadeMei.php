<?php
use dao\MeiCidadeDao;
use entity\MeiCidade;

require_once '../Config.php';

if(isset($_SESSION['logado'])){
    $meiCidade = new MeiCidade();
    $meiCidade->setId($_GET['id']);
    echo (new MeiCidadeDao)->delete($meiCidade);
}else{
    echo "Usuário não está autenticado" ;
}