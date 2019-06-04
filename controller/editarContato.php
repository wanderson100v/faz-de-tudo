<?php
use dao\ContatoDao;
use entity\Usuario;
use entity\Contato;

require_once '../Config.php';

if(isset($_SESSION['logado'])){

    $usuario = new Usuario();
    $usuario->setId($_SESSION['usuario_id']);
    $contato = new Contato();
    $contato->setId($_GET['id']);
    $contato->setTipo($_GET['tipo']);
    $contato->setDescricao($_GET['descricao']);
    $contato->setUsuario($usuario);

    echo (new contatoDao())->update($contato);
}else{
    echo "Usuário não está autenticado" ;
}