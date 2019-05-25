<?php
namespace dao;

use PDO;

/**
 * Não inicia transções (depente de transações iniciadas por terceiros)
 * @author wanderson p
 *
 */
class UsuarioDao extends Dao
{
    public function read($busca)
    {
        $buscaLike = '%'.$busca.'%' ;
        
        $stm = $this->pdo->prepare(
            "SELECT * FROM usuario 
            where  ativo = 1 
            and CONCAT(id,login) like :busca");
        $stm->bindParam("busca",$buscaLike);
        
        if($stm->execute()){
            $usuarios = array();
            while($linha = $stm->fetch(PDO::FETCH_ASSOC))
                array_push($usuarios,$linha);
            return $usuarios;
        }
    }

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
        $entity->setId($this->pdo->lastInsertId());
    }
    
    /**
     * Eclusão lógica de user
     * {@inheritDoc}
     * @see \dao\IDao::delete()
     */
    public function delete($entity)
    {
        try{
            $this->pdo->beginTransaction();
            $id = $entity->getId();
            
            $stm = $this->pdo->prepare(
                "UPDATE `fdt`.`usuario`
                SET `ativo` = 0 
                WHERE `id` = :id");
            $stm->bindParam("id",$id);
            
            $stm->execute();
            $stm->commit();
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nErro ao cadastrar administrador: ".$e->getMessage());
        }
    }
}