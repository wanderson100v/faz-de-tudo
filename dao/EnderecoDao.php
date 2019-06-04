<?php
namespace dao;

use entity\Endereco;
use entity\Usuario;
use PDO;

class EnderecoDao extends Dao
{
    public function buscarEnderecosUsuario($usuarioId){
        try{
          
            $sql = "select * from endereco as e
                    where e.usuario_id = :usuario_id";
            
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam("usuario_id",$usuarioId);
            
            if($stm->execute()){
                $adms = array();
                while($rowRs = $stm->fetch(PDO::FETCH_ASSOC))
                {
                    array_push($adms,$this->castRsObject($rowRs));
                }
                return $adms;
            }
        }catch(\PDOException $e){
            print("\nErro ao buscar: ".$e->getMessage());
        }
    }
    
    protected function getSqlReadId()
    {
        return "select * from endereco e
                where e.id = :id";
    }
    
    protected function getSqlRead()
    {
        return "select * from endereco as e
                where concat_ws(e.cep, e.num, e.logradouro, e.bairro, e.cidade, e.estado, e.pais) like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $e = new Endereco();
        $e->setId($rowRs['id']);
        $e->setCep($rowRs['cep']);
        $e->setNum($rowRs['num']);
        $e->setLogradouro($rowRs['logradouro']);
        $e->setBairro($rowRs['bairro']);
        $e->setCidade($rowRs['cidade']);
        $e->setEstado($rowRs['estado']);
        $e->setPais($rowRs['pais']);
        $u = new Usuario();
        $u->setId($rowRs['usuario_id']);
        $e->setUsuario($u);
        return $e;
        
    }
    
    protected function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`endereco`
                (`cep`,`num`,`logradouro`,`bairro`,`cidade`,`estado`,`pais`,`usuario_id`)
                VALUES(:cep, :num, :logradouro, :bairro, :cidade, :estado, :pais, :usuario_id)";
                        
    }
    
    protected function getCreateInputParameters($entity)
    {
        return array(
            'cep' => $entity->getCep(),
            'num' => $entity->getNum(),
            'logradouro' => $entity->getLogradouro(),
            'bairro' => $entity->getBairro(),
            'cidade' => $entity->getCidade(),
            'estado' => $entity->getEstado(),
            'pais' => $entity->getPais(),
            'usuario_id' => $entity->getUsuario()->getId()
        );
    }
    
    protected function getSqlUpdate()
    {
        return "UPDATE `fdt`.`endereco`
                SET `cep` = :cep, `num` = :num, `logradouro` = :logradouro, `bairro` = :bairro,
                `cidade` = :cidade, `estado` = :estado, `pais` = :pais, `usuario_id` = :usuario_id
                WHERE `id` = :id";
    }
    
    protected function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'cep' => $entity->getCep(),
            'num' => $entity->getNum(),
            'logradouro' => $entity->getLogradouro(),
            'bairro' => $entity->getBairro(),
            'cidade' => $entity->getCidade(),
            'estado' => $entity->getEstado(),
            'pais' => $entity->getPais(),
            'usuario_id' => $entity->getUsuario()->getId()
        );
    }
    
    protected function getSqlDelete()
    {
        return "DELETE FROM `fdt`.`endereco`
                WHERE id = :id";
    }
}

