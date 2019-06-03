<?php
use entity\Usuario;
use entity\Cliente;
use entity\Mei;
use entity\Contato;
use dao\ContatoDao;
use dao\ClienteDao;
use dao\MeiDao;

require_once('../Config.php');

$cadastro = $_POST['cadastro'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$cpfCnpj = $_POST['cpfCnpj'];
$nasc = $_POST['nasc'];
$sexo = $_POST['sexo'];

$usuario = new Usuario();
$usuario->setLogin($login);
$usuario->setSenha($senha);

$cliente = new Cliente();
$cliente->setTipo($tipo);
$cliente->setNome($nome);
$cliente->setCpfCnpj($cpfCnpj);
$cliente->setNasc($nasc);
$cliente->setSexo($sexo);
$cliente->setUsuario($usuario);

if($cadastro == "mei")
{
    $tipoContato = $_POST["tipoContato"];
    $descContato = $_POST["descContato"];
    
    $mei = new Mei();
    $mei->setCliente($cliente);
    
    $contato = new Contato();
    $contato->setDescricao($descContato);
    $contato->setTipo($tipoContato);
    $contato->setUsuario($usuario);
   
    $retorno = array();
    array_push($retorno,((new MeiDao())->create($mei)));
    array_push($retorno,((new ContatoDao())->create($contato)));
    echo json_encode($retorno);
}
else
{
    $retorno = array();
    array_push($retorno,(new ClienteDao())->create($cliente));
    echo json_encode($retorno);
}


