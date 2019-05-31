<?php
namespace business;

use dao\ClienteDao;
use entity\Cliente;

require_once('../Config.php');

class ClienteBo
{
    private static $instance;
    private $clienteDao;
    
    public static function getInstance()
    {
        if(!isset(self::$instance))
            self::$instance = new ClienteBo();
       return self::$instance;
    }
    
    private function __construct()
    {
        $this->clienteDao = new ClienteDao();
    }
    
    public function create(Cliente $cliente){
        $erro = $this->validar($cliente);
        if($erro == "")
        {
            return $this->clienteDao->create($cliente);
        }else
            return $erro;
    }
    
    public function validar(Cliente $cliente){
        $erro ="";
        if(!empty($cliente->getUsuario))
            $erro = UsuarioBo::getInstance()->validar($cliente->getUsuario());
        $cliente->setNome(trim($cliente->getNome()));
        $cliente->setCpfCnpj(trim($cliente->getCpfCnpj()));
        if($cliente->getNome() == null || ( $cliente->getNome() != null && $cliente->getNome() == "") )
            $erro.="*Não foi informado um nome<br>";
            if($cliente->getCpfCnpj() == null || ( $cliente->getCpfCnpj() != null && $cliente->getCpfCnpj() == "") )
            $erro.="*Não foi informado uma CPF ou CNPJ<br>";
        return $erro;
    }
}

