<?php

namespace entity;

class Servico extends Entidade{
    
    private $ativo;
    private $valor;
    private $horas;
    private $descricao;
   
    public function getAtivo()
    {
        return $this->ativo;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getHoras()
    {
        return $this->horas;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function setHoras($horas)
    {
        $this->horas = $horas;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
}