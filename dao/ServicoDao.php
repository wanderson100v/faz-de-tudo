<?php
namespace dao;

use entity\Servico;

class ServicoDao extends Dao
{
    protected function getSqlReadId()
    {
        return "select * from servico as s 
                where ativo = 1
                and s.id = :id";
    }
    
    protected function getSqlRead()
    {
        return "select * from servico as s 
                where ativo = 1 
                and concat_ws(s.valor, s.horas, s.descricao) like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $s = new Servico();
        $s->setId($rowRs['id']);
        $s->setAtivo($rowRs['ativo']);
        $s->setValor($rowRs['valor']);
        $s->setHoras($rowRs['horas']);
        $s->setDescricao($rowRs['descricao']);
        return $s;
        
    }
    
    protected function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`servico`(`valor`, `horas`, `descricao`)
                VALUES(:valor, :horas, :descricao)";

    }

    protected function getCreateInputParameters($entity)
    {
        return array(
            'valor' => $entity->getValor(),
            'horas'=> $entity->getHoras(),
            'descricao'=> $entity->getDescricao()
        );
    }
    
    protected function getSqlUpdate()
    {
        return "UPDATE `fdt`.`servico`
                SET `ativo` = :ativo, `valor` = :valor, `horas` = :horas, `descricao` = :descricao
                WHERE `id` = :id";
    }
    
    protected function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'ativo' => $entity->getAtivo(),
            'valor' => $entity->getValor(),
            'horas'=> $entity->getHoras(),
            'descricao'=> $entity->getDescricao()
        );
    }

    /**
     * exclus�o l�gica
     * {@inheritDoc}
     * @see \dao\Dao::getSqlDelete()
     */
    protected function getSqlDelete()
    {
        return "UPDATE `fdt`.`servico`
                SET `ativo` = 0
                WHERE `id` = :id";
    }
    
}

