<?php
namespace dao;

use entity\Usuario;

/**
 * Não inicia transções (depente de transações iniciadas por terceiros)
 * @author wanderson p
 *
 */
class UsuarioDao extends Dao
{
    public function create($entity)
    {
        $login = $entity->getLogin();
        $senha = $entity->getSenha();
        
        $stm = $this->pdo->prepare(
            "INSERT INTO `fdt`.`usuario` (`login`, `senha`)
            VALUES(:login, :senha)");
        $stm->bindParam("login",$login);
        $stm->bindParam("senha",$senha);
       
        $stm->execute();
        $entity->setId($this->pdo->lastInsertId());
    }

    public function update($entity)
    {
        $login = $entity->getLogin();
        $senha = $entity->getSenha();
        $ativo = $entity->getAtivo();
        $id = $entity->getId();
        
        $stm = $this->pdo->prepare(
            "UPDATE `fdt`.`usuario`
            SET `ativo` = :ativo, `login` = :login, `senha` = :senha
            WHERE `id` = :id");
        $stm->bindParam("ativo",$ativo);
        $stm->bindParam("login",$login);
        $stm->bindParam("senha",$senha);
        $stm->bindParam("id",$id);
        
        $stm->execute();
    }
    
    protected function castRsObject($rowRs)
    {
        $u = new Usuario();
        $u->setId($rowRs['id']);
        $u->setAtivo($rowRs['ativo']);
        $u->setLogin($rowRs['login']);
        $u->setSenha($rowRs['senha']);
        return $u;
    }

    protected function getSqlRead()
    {
        return  "SELECT * FROM usuario
                where  ativo = 1
                and CONCAT(id,login) like :busca";
    }
    
    protected function getUpdateInputParameters($entity)
    {}

    protected function getCreateInputParameters($entity)
    {}

    protected function getDeleteInputParameters()
    {}

    protected function getSqlUpdate()
    {}

    protected function getSqlCreate()
    {}

    protected function getSqlDelete()
    {
        return "UPDATE `fdt`.`usuario`
                SET `ativo` = 0
                WHERE `id` = :id";
    }

}