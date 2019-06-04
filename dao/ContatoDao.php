<?php
namespace dao;

use entity\Contato;
use entity\Usuario;
use PDO;

class ContatoDao extends Dao
{
    
    public function buscarContatosUsuario($usuarioId){
        try{
          
            $sql = "select * from contato as a
                    where a.usuario_id = :usuario_id";
            
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

