<?php

namespace entity;

class Cliente extends Entidade{
    
    private $tipo;
    private $cpfCnpj;
    private $nome;
    private $nasc;
    private $sexo;
    private $usuario;

    public function __construct($id, $tipo ,$cpfCnpj, $nome ,$nasc, $sexo ,$usuario)
    {
        parent::__construct($id);
        $this->tipo = $tipo;
        $this->cpfCnpj = $cpfCnpj;
        $this->nome = $nome;
        $this->nasc = $nasc;
        $this->sexo = $sexo;
        $this->usuario = $usuario;
    }
 
    public function getTipo()
    {
        return $this->tipo;
    }

    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getNasc()
    {
        return $this->nasc;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setNasc($nasc)
    {
        $this->nasc = $nasc;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    
}