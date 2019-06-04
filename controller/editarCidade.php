<?php
use dao\CidadeDao;
use entity\Cidade;

require_once '../Config.php';

if(isset($_SESSION['logado'])){

    $cidade = new cidade();
    $cidade->setId($_GET['id']);
    $cidade->setNome($_GET['nome']);
  
    echo (new CidadeDao())->update($cidade);
}else{
    echo "Usuário não está autenticado" ;
}