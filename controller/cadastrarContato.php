<?php
use dao\ContatoDao;
use entity\Contato;
use entity\Usuario;

require_once '../Config.php';

if(isset($_SESSION['logado']))
{
    $usuario = new Usuario();
    $usuario->setId($_SESSION['usuario_id']);
    
    $contato = new Contato();
    $contato->setTipo($_GET['tipo']);
    $contato->setDescricao($_GET['descricao']);
    $contato->setUsuario($usuario);

    echo (new ContatoDao())->create($contato);
}else{
    echo "Usuário não está autenticado" ;
}