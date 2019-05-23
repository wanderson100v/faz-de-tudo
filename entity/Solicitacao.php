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
    
    public function __construct($id, $aceita, $status, $ptsCliente, $ptsMei, $horario, $cliente, $servicoMei, $endereco)
    {
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

    public function getAceita()
    {
        return $this->aceita;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPtsCliente()
    {
        return $this->ptsCliente;
    }

    public function getPtsMei()
    {
        return $this->ptsMei;
    }

    public function getHorario()
    {
        return $this->horario;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getServicoMei()
    {
        return $this->servicoMei;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setAceita($aceita)
    {
        $this->aceita = $aceita;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setPtsCliente($ptsCliente)
    {
        $this->ptsCliente = $ptsCliente;
    }

    public function setPtsMei($ptsMei)
    {
        $this->ptsMei = $ptsMei;
    }

    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function setServicoMei($servicoMei)
    {
        $this->servicoMei = $servicoMei;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
}