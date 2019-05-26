<?php
namespace entity;

class MeiCidade extends Entidade
{
    private $cidade;
    private $mei;
   
    public function getCidade()
    {
        return $this->cidade;
    }

    public function getMei()
    {
        return $this->mei;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function setMei($mei)
    {
        $this->mei = $mei;
    }
}