<?php

namespace entity;

class Mei{
    
    private $cliente;
    private $cidades;

    public function __construct($id, $cliente){
        parrent::__construct($id);
        $this->cliente = $cliente;
    }

}