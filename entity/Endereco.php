<?php

namespace entity;

class Endereco{

    private $cep;
    private $num;
    private $logradouro;
    private $bairro;
    private $cidade;
    private $estado;
    private $pais;
    private $usuario;

    public function __construct($id ,$cep,  $num, $logradouro, $bairro, $cidade, $estado, $pais, $usuario){
        parrent::__construct($id);
        $this->cep ; $cep;
        $this->num ; $num;
        $this->logradouro ; $logradouro;
        $this->bairro ; $bairro;
        $this->cidade ; $cidade;
        $this->estado ; $estado;
        $this->pais ; $pais;
        $this->usuario ; $usuario;
    }

}
