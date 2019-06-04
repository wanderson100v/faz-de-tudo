<?php
use dao\EnderecoDao;
use entity\Endereco;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $endereco = new Endereco();
    $endereco->setId($_GET['id']);
    echo (new EnderecoDao)->delete($endereco);
}else{
    echo "Usuário não está autenticado" ;
}