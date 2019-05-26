<?php

namespace entity;

class Cidade extends Entidade{

    private $nome;
    private $meis;    

    public function getNome()
    {
        return $this->nome;
    }
    
    public function getMeis()
    {
        return $this->meis;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setMeis($meis)
    {
        $this->meis = $meis;
    }   
}