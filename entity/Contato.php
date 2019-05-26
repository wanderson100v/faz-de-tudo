<?php 

namespace entity;

class Contato extends Entidade{
    
    private $tipo;
    private $descricao;
    private $usuario;
    
    public function getTipo()
    {
        return $this->tipo;
    }
    
    public function getDescricao()
    {
        return $this->descricao;
    }
    
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    
}
