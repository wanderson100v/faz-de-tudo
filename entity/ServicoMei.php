<?php

namespace entity;

class ServicoMei{
   
    private $ativo;
    private $valor;
    private $horas;
    private $servico;
    private $mei;

    public function __construct($id, $ativo, $valor, $horas, $servico, $mei){
        parrent::__construct($id);
        $this->ativo = $ativo;
        $this->valor = $valor.
        $this->horas = $horas;
        $this->servico = $servico;
        $this->mei = $mei;
    }

}