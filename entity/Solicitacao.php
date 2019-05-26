<?php

namespace entity;

class Solicitacao extends Entidade{
    
    private $aceita;
    private $estado;
    private $ptsCliente;
    private $ptsMei;
    private $horario;
    private $cliente;
    private $servicoMei;
    private $endereco;
    
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getAceita()
    {
        return $this->aceita;
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