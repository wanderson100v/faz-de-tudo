<?php
use dao\ServicoDao;
use entity\Servico;

require_once '../Config.php';

if(isset($_SESSION['logado'])){

    $servico = new Servico();
    $servico->setId($_GET['id']);
    $servico->setAtivo(true);
    $servico->setHoras($_GET['horas']);
    $servico->setValor($_GET['valor']);
    $servico->setDescricao($_GET['descricao']);

    echo (new ServicoDao())->update($servico);
}else{
    echo "Usuário não está autenticado" ;
}