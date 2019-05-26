<?php
namespace dao;

use entity\Solicitacao;
use entity\Cliente;
use entity\ServicoMei;
use entity\Endereco;

class SolicitacaoDao extends Dao
{
    protected function getSqlRead()
    {
        return "SELECT * FROM SOLICITACAO 
                where CONCAT_WS(aceita, estado, pts_cliente, pts_mei, horario) like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $s = new Solicitacao();
        $s->setId($rowRs['id']);
        $s->setEstado($rowRs['estado']);
        $s->setPtsCliente($rowRs['pts_cliente']);
        $s->setPtsMei($rowRs['pts_mei']);
        $s->setHorario($rowRs['horario']);
        
        $cliente = new Cliente();
        $cliente->setId($rowRs['cliente_id']);
        $s->setCliente($cliente);
        
        $servicoMei = new ServicoMei();
        $servicoMei->setId($rowRs['servico_mei_id']);
        $s->setServicoMei($servicoMei);
        
        $endereco = new Endereco();
        $endereco->setId($rowRs['endereco_id']);
        $s->setEndereco($endereco);
        
        return $s;
        
    }
    
    protected function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`solicitacao`
                (`estado`,`pts_cliente`,`pts_mei`,`cliente_id`,`servico_mei_id`,`endereco_id`)
                VALUES ( :estado, :pts_cliente, :pts_mei, :cliente_id, :servico_mei_id, :endereco_id)";
    }
    
    protected function getCreateInputParameters($entity)
    {
        return array(
            'estado' => $entity->getEstado(),
            'pts_cliente'=> $entity->getPtsCliente(),
            'pts_mei'=> $entity->getPtsMei(),
            'cliente_id'=> $entity->getCliente()->getId(),
            'servico_mei_id'=> $entity->getServicoMei()->getId(),
            'endereco_id'=> $entity->getEndereco()->getId()
        );
    }
    
    protected function getSqlUpdate()
    {
        return "UPDATE `fdt`.`solicitacao`
                SET `aceita` = :aceita, `estado` = :estado, `pts_cliente` = :pts_cliente, `pts_mei` = :pts_mei,
                `horario` = :horario, `cliente_id` = :cliente_id, `servico_mei_id` = :servico_mei_id,
                `endereco_id` = :endereco_id
                WHERE `id` = :id";
    }
    
    protected function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'aceita' => $entity->getAceita(),
            'horario' => $entity->getHorario(),
            'estado' => $entity->getEstado(),
            'pts_cliente'=> $entity->getPtsCliente(),
            'pts_mei'=> $entity->getPtsMei(),
            'cliente_id'=> $entity->getCliente()->getId(),
            'servico_mei_id'=> $entity->getServicoMei()->getId(),
            'endereco_id'=> $entity->getEndereco()->getId(),
        );
    }
    
    protected function getSqlDelete()
    {
        return "DELETE FROM `fdt`.`solicitacao`
                WHERE `id` = :id";
    }
}

