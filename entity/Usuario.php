<?php

namespace entity;

class Usuario extends Entidade{
    
    private $ativo;
    private $login;
    private $senha;
  
    public function getAtivo()
    {
        return $this->ativo;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}