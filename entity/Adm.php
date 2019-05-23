<?php

namespace entity;

class Adm{
    
    private $gralAcesso;
    private $usuario;

    public function __construct($id, $gralAcesso ,$usuario){
        parrent::__construct($id);
        $this->gralAcesso = $gralAcesso;
        $this->usuario = $usuario;
    }
 
}