<?php 

use dao\EnderecoDao;

require_once('Config.php');

$ed = new EnderecoDao();

$e = $ed->read("5050-550")[0];

var_dump($e);
$ed->delete($e);