<?php 

namespace entity;

class Contato{
    
    private $tipo;
    private $descrica;
    private $usuario;

    public function __construct($id ,$tipo, $descrica, $usuario){
        parrent::__construct($id);
        $this->tipo = $tipo;
        $this->descrica = $descrica;
        $this->usuario = $usuario;
    }

}