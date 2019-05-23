<?php

namespace entity;

class Cidade{

    private $nome;
    private $meis;    

    public function __construct($id, $nome){
        parrent::__construct($id);
        $thi->nome = $nome;
    }
}