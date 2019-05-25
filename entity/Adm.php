<?php

namespace entity;

class Adm extends Entidade{
    
    private $gralAcesso;
    private $usuario;

    public function __construct($gralAcesso ,$usuario)
    {
        $this->gralAcesso = $gralAcesso;
        $this->usuario = $usuario;
    }

    public function getGralAcesso()
    {
        return $this->gralAcesso;
    }
   
    public function getUsuario()
    {
        return $this->usuario;
    }
   
    public function setGralAcesso($gralAcesso)
    {
        $this->gralAcesso = $gralAcesso;
    }
    
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
   
}