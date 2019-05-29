<?php
namespace business;

use entity\Mei;
use dao\MeiDao;

require_once('../Config.php');

class MeiBo
{
    private static $instance;
    private $meiDao;
    
    public static function getInstance()
    {
        if(!isset(self::$instance))
            self::$instance = new MeiBo();
        return self::$instance;
    }
    
    private function __construct()
    {
        $this->meiDao = new MeiDao();
    }
    
    public function create(Mei $mei){
        $erro = $this->validar($mei);
        if($erro == "")
        {
            return$this->meiDao->create($mei);
        }
        else
            return $erro;
    }
    
    public function validar(Mei $mei){
        $erro = ClienteBo::getInstance()->validar($mei->getCliente());
        return $erro;
    }
}


