<?php

namespace entity;

class Cliente{
    
    private $tipo;
    private $cpfCnpj;
    private $nome;
    private $nasc;
    private $sexo;
    private $usuario;

    public function __construct($id, $tipo ,$cpfCnpj, $nome ,$nasc, $sexo ,$usuario){
        parrent::__construct($id);
        $this->tipo = $tipo;
        $this->cpfCnpj = $cpfCnpj;
        $this->nome = $nome;
        $this->nasc = $nasc;
        $this->sexo = $sexo;
        $this->usuario = $usuario;
    }
    
}