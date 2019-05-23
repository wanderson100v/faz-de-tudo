<?php 

namespace entity;

class Contato extends Entidade{
    
    private $tipo;
    private $descrica;
    private $usuario;
    
    public function __construct($id ,$tipo, $descrica, $usuario){
        parent::__construct($id);
        $this->tipo = $tipo;
        $this->descrica = $descrica;
        $this->usuario = $usuario;
    }
    
    public function getTipo()
    {
        return $this->tipo;
    }
    
    public function getDescrica()
    {
        return $this->descrica;
    }
    
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    
    public function setDescrica($descrica)
    {
        $this->descrica = $descrica;
    }
    
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    
}
