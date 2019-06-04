<?php
namespace dao;

use entity\Contato;
use entity\Usuario;

class ContatoDao extends Dao
{
    
    protected function getSqlReadId()
    {
        return "SELECT * FROM fdt.contato as c
                where c.id = :id";
    }
    
    protected function getSqlRead()
    {
        return "SELECT * FROM fdt.contato as c
                where concat_ws(c.tipo, c.descricao) like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $c = new Contato();
        $c->setId($rowRs['id']);
        $c->setTipo($rowRs['tipo']);
        $c->setDescricao($rowRs['descricao']);
        $u = new Usuario();
        $u->setId($rowRs['usuario_id']);
        $c->setUsuario($u);
        return $c;
        
    }
    
    protected function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`contato`
                (`tipo`,`descricao`, `usuario_id`)
                VALUES ( :tipo, :descricao, :usuario_id)";
        
    }
    
    protected function getCreateInputParameters($entity)
    {
        return array(
            'descricao' => $entity->getDescricao(),
            'tipo' => $entity->getTipo(),
            'usuario_id' => $entity->getUsuario()->getId()
        );
    }
    
    protected function getSqlUpdate()
    {
        return "UPDATE `fdt`.`contato`
            SET `tipo` = :tipo, `descricao` = :descricao, `usuario_id` = :usuario_id
            WHERE `id` = :id";
    }
    
    protected function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'descricao' => $entity->getDescricao(),
            'tipo' => $entity->getTipo(),
            'usuario_id' => $entity->getUsuario()->getId()
        );
    }
    
    protected function getSqlDelete()
    {
        return "DELETE FROM `fdt`.`contato`
                WHERE id = :id";
    }
}

