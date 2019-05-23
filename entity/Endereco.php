<?php

namespace entity;

class Endereco extends Entidade{

    private $cep;
    private $num;
    private $logradouro;
    private $bairro;
    private $cidade;
    private $estado;
    private $pais;
    private $usuario;
    
    public function __construct($id ,$cep,  $num, $logradouro, $bairro, $cidade, $estado, $pais, $usuario){
        parent::__construct($id);
        $this->cep ; $cep;
        $this->num ; $num;
        $this->logradouro ; $logradouro;
        $this->bairro ; $bairro;
        $this->cidade ; $cidade;
        $this->estado ; $estado;
        $this->pais ; $pais;
        $this->usuario ; $usuario;
    }
    
    public function getCep()
    {
        return $this->cep;
    }
    
    public function getNum()
    {
        return $this->num;
    }
    
    public function getLogradouro()
    {
        return $this->logradouro;
    }
    
    public function getBairro()
    {
        return $this->bairro;
    }
    
    public function getCidade()
    {
        return $this->cidade;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }
    
    public function getPais()
    {
        return $this->pais;
    }
    
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    
    public function setNum($num)
    {
        $this->num = $num;
    }
    
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }
    
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    
    public function setPais($pais)
    {
        $this->pais = $pais;
    }
    
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
}
