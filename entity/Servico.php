<?php

namespace entity;

class Servico{
    
    private $ativo;
    private $valor;
    private $horas;
    private $descricao;

    public function __construct($ativo, $valor, $horas, $descricao){
        $this->ativo = $ativo ;
        $this->valor = $valor ;
        $this->horas = $horas ;
        $this->descricao = $descricao ;
    }

}