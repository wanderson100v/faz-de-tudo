<?php
namespace dao;

use entity\Mei;
use entity\Servico;
use entity\ServicoMei;

use PDO;

class ServicoMeiDao extends Dao
{

      
    public function buscarPorServicoMei($meiId, $servicoId)
    {
        $sql = "SELECT * FROM SERVICO_MEI AS ser_m
            WHERE ser_m.servico_id = :servicoId
            AND ser_m.mei_id = :meiId";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam("servicoId",$servicoId);
        $stm->bindParam("meiId",$meiId);
        
        if($stm->execute()){
            $rowRs = $stm->fetch(PDO::FETCH_ASSOC);
            if(!empty($rowRs)){
                return $rowRs['id'];
            }
            return 0;
        }

    }

    public function buscarPorMei($meiId)
    {
        $sql = "SELECT  ser_m.id, ser_m.ativo, ser_m.valor, ser_m.horas,ser_m.mei_id,
                    ser_m.servico_id, ser.descricao
                FROM MEI as m
                INNER JOIN CLIENTE as cl ON (m.cliente_id = cl.id)
                INNER JOIN USUARIO as u ON (cl.usuario_id = u.id)
                INNER JOIN SERVICO_MEI as ser_m ON (ser_m.mei_id = m.id)
                INNER JOIN SERVICO as ser ON (ser_m.servico_id = ser.id)
                WHERE u.ativo = 1
                AND ser_m.ativo = 1
                AND ser.ativo = 1
                AND ser_m.mei_id = :meiId";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam("meiId",$meiId);
        
        if($stm->execute()){
            $adms = array();
            while($rowRs = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($adms,$this->castRsObject($rowRs));
            }
            return $adms;
        }
    }

    protected function getSqlReadId()
    {
        return "SELECT  ser_m.id, ser_m.ativo, ser_m.valor, ser_m.horas,ser_m.mei_id,
                	ser_m.servico_id
                FROM MEI as m
                INNER JOIN CLIENTE as cl ON (m.cliente_id = cl.id)
                INNER JOIN USUARIO as u ON (cl.usuario_id = u.id)
                INNER JOIN SERVICO_MEI as ser_m ON (ser_m.mei_id = m.id)
                INNER JOIN SERVICO as ser ON (ser_m.servico_id = ser.id)
                WHERE u.ativo = 1
                AND ser.ativo = 1
                AND ser_m.id = :id";
    }
    
    protected function getSqlRead()
    {
        return "SELECT  ser_m.id, ser_m.ativo, ser_m.valor, ser_m.horas,ser_m.mei_id,
                	ser_m.servico_id
                FROM MEI as m
                INNER JOIN CLIENTE as cl ON (m.cliente_id = cl.id)
                INNER JOIN USUARIO as u ON (cl.usuario_id = u.id)
                INNER JOIN SERVICO_MEI as ser_m ON (ser_m.mei_id = m.id)
                INNER JOIN SERVICO as ser ON (ser_m.servico_id = ser.id)
                WHERE u.ativo = 1
                AND ser_m.ativo = 1
                AND ser.ativo = 1
                AND CONCAT_WS(ser_m.valor, ser_m.horas, ser.descricao, ser.valor
                	, ser.horas, cl.nome, cl.cpf_cnpj, u.login) like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $m = new Mei();
        $m->setId($rowRs['mei_id']);
        
        $s = new Servico();
        $s->setId($rowRs['servico_id']);
        if(isset($rowRs['descricao']))
            $s->setDescricao($rowRs['descricao']);
   
        $servicoMei = new ServicoMei();
        $servicoMei->setId($rowRs['id']);
        $servicoMei->setAtivo($rowRs['ativo']);
        $servicoMei->setHoras($rowRs['horas']);
        $servicoMei->setValor($rowRs['valor']);
        $servicoMei->setMei($m);
        $servicoMei->setServico($s);
        
        return $servicoMei;
    }
    
    protected function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`servico_mei` (`valor`,`horas`,`mei_id`,`servico_id`)
                VALUES( :valor, :horas, :mei_id, :servico_id)";
        
    }
    
    protected function getCreateInputParameters($entity)
    {
        return array(
            'valor'=> $entity->getValor(),
            'horas'=> $entity->getHoras(),
            'mei_id'=> $entity->getMei()->getId(),
            'servico_id'=> $entity->getServico()->getId()
        );
    }
    
    protected function getSqlUpdate()
    {
        return "UPDATE `fdt`.`servico_mei`
                SET `ativo` = :ativo, `valor` = :valor, `horas` = :horas, `mei_id` = :mei_id,
                    `servico_id` = :servico_id
                WHERE `id` = :id";
    }
    
    protected function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'ativo' => $entity->getAtivo(),
            'valor'=> $entity->getValor(),
            'horas'=> $entity->getHoras(),
            'mei_id'=> $entity->getMei()->getId(),
            'servico_id'=> $entity->getServico()->getId()
        );
    }
    
    /**
     * exclus�o l�gica
     * {@inheritDoc}
     * @see \dao\Dao::getSqlDelete()
     */
    protected function getSqlDelete()
    {
        return "UPDATE `fdt`.`servico_mei`
                SET `ativo` = 0
                WHERE `id` = :id";
    }
}

