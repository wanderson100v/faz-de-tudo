<?php 

use dao\ServicoDao;

require_once('Config.php');


$servico = (new ServicoDao())->read("a")[0];
$servico->setDescricao("Nova descrição");
var_dump((new ServicoDao())->update($servico));

