<?php

namespace entity;

class Solicitacao extends Entidade{
    
    private $aceita;
    private $status;
    private $ptsCliente;
    private $ptsMei;
    private $horario;
    private $cliente;
    private $servicoMei;
    private $endereco;

    public function __construct($id, $aceita, $status, $ptsCliente, $ptsMei, $horario, $cliente, $servicoMei, $endereco){
        parent::__construct($id);
        $this->aceita = $aceita;
        $this->status = $status;
        $this->ptsCliente = $ptsCliente;
        $this->ptsMei = $ptsMei;
        $this->horario = $horario;
        $this->cliente = $cliente;
        $this->servicoMei = $servicoMei;
        $this->endereco = $endereco;
    }
    
}