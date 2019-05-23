<?php

namespace entity;

class ServicoMei{
   
    private $ativo;
    private $valor;
    private $horas;
    private $servico;
    private $mei;
    
    public function __construct($id, $ativo, $valor, $horas, $servico, $mei)
    {
        parent::__construct($id);
        $this->ativo = $ativo;
        $this->valor = $valor.
        $this->horas = $horas;
        $this->servico = $servico;
        $this->mei = $mei;
    }

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

    public function getServico()
    {
        return $this->servico;
    }

    public function getMei()
    {
        return $this->mei;
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

    public function setServico($servico)
    {
        $this->servico = $servico;
    }

    public function setMei($mei)
    {
        $this->mei = $mei;
    }
}