<?php
namespace dao;

class AdmDao extends Dao
{
    
    private $usuarioDao;
    
    public function __construct()
    {
        parent::__construct();
        $this->usuarioDao = new UsuarioDao();
    }
    
    public function read($busca)
    {
        
    }
    
    public function create($entity)
    {
        try{
            $this->pdo->beginTransaction();
            //cadastrando em cascata
            $this->usuarioDao->create($entity->getUsuario());
            
            $gralAcesso = $entity->getGralAcesso();
            $usuarioId = $entity->getUsuario()->getId();
            
            $stm = $this->pdo->prepare(
                "INSERT INTO `fdt`.`adm`(`gral_acesso`,`usuario_id`)
                VALUES(:gral_acesso , :usuario_id)");
            $stm->bindParam("gral_acesso",$gralAcesso);
            $stm->bindParam("usuario_id", $usuarioId);
            
            $stm->execute();
            $entity->setId($this->pdo->lastInsertId());
            $this->pdo->commit();
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nErro ao cadastrar administrador: ".$e->getMessage());
        }
    }
    
    public function update($entity)
    {
        try{
            $this->pdo->beginTransaction();
            //editando em cascata
            $this->usuarioDao->update($entity->getUsuario());
            
            $gralAcesso = $entity->getGralAcesso();
            $usuarioId = $entity->getUsuario()->getId();
            $id = $entity->getId();
            
            $stm = $this->pdo->prepare(
                "UPDATE `fdt`.`adm`
                SET `gral_acesso` = :gral_acesso, `usuario_id` =:usuario_id:
                WHERE `id` = :id");
            $stm->bindParam("gral_acesso",$gralAcesso);
            $stm->bindParam("usuario_id", $usuarioId);
            $stm->bindParam("id", $id);
            $stm->execute();
            $entity->setId($this->pdo->lastInsertId());
            $this->pdo->commit();
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nErro ao editar administrador: ".$e->getMessage());
        }
    }

    public function delete($entity)
    {
        
    }
}