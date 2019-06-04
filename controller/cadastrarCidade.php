<?php
use dao\CidadeDao;
use entity\Cidade;

require_once '../Config.php';

if(isset($_SESSION['logado']))
{    
    $cidade = new Cidade();
    $cidade->setNome($_GET['nome']);
    echo (new CidadeDao())->create($cidade);
}else{
    echo "Usuário não está autenticado" ;
}