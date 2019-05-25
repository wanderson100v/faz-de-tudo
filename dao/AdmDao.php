<?php
namespace dao;

use entity\Adm;
use entity\Usuario;

class AdmDao extends Dao
{
    
    private $usuarioDao;
    
    public function __construct()
    {
        parent::__construct();
        $this->usuarioDao = new UsuarioDao();
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

    /**
     * Exclusão lógica
     * {@inheritDoc}
     * @see \dao\IDao::delete()
     */
    public function delete($entity)
    {
        $this->usuarioDao->delete($entity);
    }
    
    
    /**
     * busca através de login de usuario e gral de acesso
     * {@inheritDoc}
     * @see \dao\IDao::read()
     */
    
    function castRsObject($rowRs)
    {
        $adm = new Adm();
        $adm->setId($rowRs['id']);
        $adm->setGralAcesso($rowRs['gral_acesso']);
        $usuario = new Usuario();
        $usuario->setId($rowRs["usuario_id"]);
        $adm->setUsuario($usuario);
        return $adm;
    }

    function getSqlRead()
    {
        return "select  a.*
                from adm as a inner join usuario as u on (a.usuario_id = u.id)
                where u.ativo = 1 
                and CONCAT(a.gral_acesso, u.login) like :busca";
    }
   
    public function getUpdateInputParameters()
    {}

    public function getCreateInputParameters()
    {}

    public function getDeleteInputParameters()
    {}

    public function getSqlUpdate()
    {}

    public function getSqlCreate()
    {}

    public function getSqlDelete()
    {}

}