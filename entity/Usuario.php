<?php

namespace entity;

class Usuario{
    
    private $ativo;
    private $login;
    private $senha;

    public function __construct($ativo, $login, $senha){
        $this->ativo = $ativo;
        $this->login = $login;
        $this->senha = $senha;
    }
}