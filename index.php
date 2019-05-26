<?php 


use dao\ServicoMeiDao;
use entity\Solicitacao;
use dao\SolicitacaoDao;
use dao\ClienteDao;
use dao\EnderecoDao;

require_once('Config.php');


(new SolicitacaoDao())->delete((new SolicitacaoDao())->read("")[0]);




