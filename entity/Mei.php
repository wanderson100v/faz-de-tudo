<?php

namespace entity;

class Mei extends Entidade{
    
    private $cliente;
    private $cidades;

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getCidades()
    {
        return $this->cidades;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function setCidades($cidades)
    {
        $this->cidades = $cidades;
    }
}