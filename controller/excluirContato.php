<?php
use dao\ContatoDao;
use entity\Contato;

require_once '../Config.php';

if(isset($_SESSION['logado'])){
    $contato = new Contato();
    $contato->setId($_GET['id']);
    echo (new ContatoDao)->delete($contato);
}else{
    echo "Usuário não está autenticado" ;
}