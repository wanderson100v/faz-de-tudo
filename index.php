<?php 


use dao\UsuarioDao;

require_once('Config.php');

echo var_dump((new UsuarioDao())->read("a"));