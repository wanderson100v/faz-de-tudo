<?php
namespace business;

use entity\Usuario;

require_once('../Config.php');

class UsuarioBo
{
    private static $instance;
    
    public static function getInstance()
    {
        if(!isset(self::$instance))
            self::$instance = new UsuarioBo();
            return self::$instance;
    }
    
    private function __construct(){}
    
    public function validar(Usuario $usuario)
    {
        $usuario->setSenha(trim($usuario->getSenha()));
        $usuario->setLogin(trim($usuario->getLogin()));
        $erro ="";
        if($usuario->getLogin() == null || ( $usuario->getLogin() != null && $usuario->getLogin() == "") )
            $erro.="*Não foi informado um login<br>";
        if($usuario->getSenha() == null || ( $usuario->getSenha() != null && $usuario->getSenha() == "") )
            $erro.="*Não foi informado uma senha<br>";
        return $erro;
            
    }
}

