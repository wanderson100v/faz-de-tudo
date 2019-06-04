<?php
namespace dao;

use entity\Cidade;

class CidadeDao extends Dao
{
    protected function getSqlReadId()
    {
        return "select * from cidade as c
                where c.id = :id";
    }
    
    protected function getSqlRead()
    {
        return "select * from cidade as c
                where c.nome like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $s = new Cidade();
        $s->setId($rowRs['id']);
        $s->setNome($rowRs['nome']);
        return $s;
        
    }
    
    protected function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`cidade`(`nome`)
                VALUES(:nome)";
        
    }
    
    protected function getCreateInputParameters($entity)
    {
        return array(
            'nome' => $entity->getNome()
        );
    }
    
    protected function getSqlUpdate()
    {
        return "UPDATE `fdt`.`cidade`
                SET `nome` = :nome
                WHERE `id` = :id";
    }
    
    protected function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'nome' => $entity->getNome()
        );
    }
    
    protected function getSqlDelete()
    {
        return "DELETE FROM `fdt`.`cidade`
                WHERE id = :id";
    }
    
}

