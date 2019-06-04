<?php
namespace dao;


use entity\MeiCidade;
use entity\Cidade;
use entity\Usuario;
use entity\Cliente;
use entity\Mei;

class MeiCidadeDao extends Dao
{
    
    protected function getSqlReadId()
    {
        return "SELECT mc.id, mc.mei_id, ci.nome as nome_cidade , m.cliente_id, cl.tipo,
                    cl.cpf_cnpj, cl.nome as nome_cliente , cl.nasc, cl.sexo, cl.usuario_id
                FROM MEI as m
                INNER JOIN CLIENTE as cl ON (m.cliente_id = cl.id)
                INNER JOIN USUARIO as u ON (cl.usuario_id = u.id)
                INNER JOIN MEI_CIDADE mc ON (mc.mei_id = m.id)
                INNER JOIN CIDADE ci ON (mc.cidade_id = ci.id)
                WHERE u.ativo = 1
                and mc.id = :id";
    }
    
    protected function getSqlRead()
    {
        return "SELECT mc.id, mc.mei_id, ci.nome as nome_cidade , m.cliente_id, cl.tipo,
                    cl.cpf_cnpj, cl.nome as nome_cliente , cl.nasc, cl.sexo, cl.usuario_id
                FROM MEI as m
                INNER JOIN CLIENTE as cl ON (m.cliente_id = cl.id)
                INNER JOIN USUARIO as u ON (cl.usuario_id = u.id)
                INNER JOIN MEI_CIDADE mc ON (mc.mei_id = m.id)
                INNER JOIN CIDADE ci ON (mc.cidade_id = ci.id)
                WHERE u.ativo = 1
                AND CONCAT_WS(ci.nome, cl.tipo, cl.cpf_cnpj ,cl.nome, cl.nasc, cl.sexo, u.login) like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $m = new Mei();
        $m->setId($rowRs['mei_id']);
        
        $c = new Cliente();
        $c->setId($rowRs['cliente_id']);
        $c->setTipo($rowRs['tipo']);
        $c->setCpfCnpj($rowRs['cpf_cnpj']);
        $c->setNome($rowRs['nome_cliente']);
        $c->setNasc($rowRs['nasc']);
        $c->setSexo($rowRs['sexo']);
        $m->setCliente($c);
        
        $u = new Usuario();
        $u->setId($rowRs['usuario_id']);
        $c->setUsuario($u);
        
        $cidade = new Cidade();
        $cidade->setId($rowRs['id']);
        $cidade->setNome($rowRs['nome_cidade']);
        
        $meiCidade = new MeiCidade();
        $meiCidade->setId($rowRs['id']);
        $meiCidade->setCidade($cidade);
        $meiCidade->setMei($m);
        
        return $meiCidade;
        
    }
    
    protected function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`mei_cidade` (`mei_id`,`cidade_id`)
                VALUES ( :mei_id, :cidade_id)";
        
    }
    
    protected function getCreateInputParameters($entity)
    {
        return array(
            'mei_id' => $entity->getMei()->getId(),
            'cidade_id'=> $entity->getCidade()->getId()
        );
    }
    
    protected function getSqlUpdate()
    {
        return "UPDATE `fdt`.`mei_cidade`
                SET `mei_id` = :mei_id, `cidade_id` = :cidade_id
                WHERE `id` = :id";
    }
    
    protected function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'mei_id' => $entity->getMei()->getId(),
            'cidade_id'=> $entity->getCidade()->getId()
        );
    }
    
    protected function getSqlDelete()
    {
        return "DELETE FROM `fdt`.`mei_cidade`
                WHERE `id` = :id";
    }
}

