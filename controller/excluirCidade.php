<?php
use dao\CidadeDao;
use entity\Cidade;

require_once '../Config.php';

if(isset($_SESSION['logado'])){
    $cidade = new cidade();
    $cidade->setId($_GET['id']);
    echo (new CidadeDao)->delete($cidade);
}else{
    echo "Usuário não está autenticado" ;
}