<?php
namespace dao;

use entity\Endereco;
use entity\Usuario;

class EnderecoDao extends Dao
{
    protected function getSqlRead()
    {
        return "select * from endereco as e
                where concat(e.cep, e.num, e.logradouro, e.bairro, e.cidade, e.estado, e.pais) like :busca";
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
                SET `cep` = cep, `num` = num, `logradouro` = :logradouro, `bairro` = :bairro,
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

