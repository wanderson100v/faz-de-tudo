<?php
namespace dao;

use entity\Adm;
use entity\Usuario;
use PDO;

class AdmDao extends Dao
{
    

    public function buscarUsuario($login, $senha){
        
        try{
            $stm = $this->pdo->prepare(
                "select  a.id as id, a.gral_acesso, a.usuario_id, u.ativo, u.login, u.senha
                from adm as a inner join usuario as u on (a.usuario_id = u.id)
                where u.ativo = 1
                AND u.login = :login 
                AND u.senha = :senha"
                );
            
            $stm->bindParam("login",$login);
            $stm->bindParam("senha",$senha);
            
            if($stm->execute()){
                $rowRs = $stm->fetch(PDO::FETCH_ASSOC);
                if($rowRs != null){
                    return $this->castRsObject($rowRs);
                }
            }
            return null;
        }catch(\PDOException $e){
            print("\nErro ao buscar: ".$e->getMessage());
        }
    }

    
    /**
     * cadastrando usuário e administrador em cascata
     * {@inheritDoc}
     * @see \dao\Dao::create()
     */
    public function create($entity)
    {
        try{
            $this->pdo->beginTransaction();
            
            //cadastrando usuário
            $usuario = $entity->getUsuario();
            
            $login = $usuario->getLogin();
            $senha = $usuario->getSenha();
            
            $stm = $this->pdo->prepare(
                "INSERT INTO `fdt`.`usuario` (`login`, `senha`)
            VALUES(:login, :senha)");
            $stm->bindParam("login",$login);
            $stm->bindParam("senha",$senha);
            
            if($stm->execute()){
                $usuario->setId($this->pdo->lastInsertId());
                //fim cadastro usuário
                
                // cadastrando adm
                $gralAcesso = $entity->getGralAcesso();
                $usuarioId = $usuario->getId();
                
                $stm = $this->pdo->prepare(
                    "INSERT INTO `fdt`.`adm`(`gral_acesso`,`usuario_id`)
                    VALUES(:gral_acesso , :usuario_id)");
                $stm->bindParam("gral_acesso",$gralAcesso);
                $stm->bindParam("usuario_id", $usuarioId);
                
                if($stm->execute()){
                    $entity->setId($this->pdo->lastInsertId());
                    $this->pdo->commit();
                }else
                    throw new \PDOException("Erro ao cadastrar administrador");
            }else 
                throw new \PDOException("Erro ao cadastrar usuário de administrador");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nErro ao cadastrar administrador: ".$e->getMessage());
        }
    }
    
    /**
     * editando usuário e administrador em cascata
     * {@inheritDoc}
     * @see \dao\Dao::update()
     */
    public function update($entity)
    {
        try{
            $this->pdo->beginTransaction();
            
            //editando usuário
            $usuario = $entity->getUsuario();
            
            $login = $usuario->getLogin();
            $senha = $usuario->getSenha();
            $ativo = $usuario->getAtivo();
            $id = $usuario->getId();
            
            $stm = $this->pdo->prepare(
                "UPDATE `fdt`.`usuario`
            SET `ativo` = :ativo, `login` = :login, `senha` = :senha
            WHERE `id` = :id");
            $stm->bindParam("ativo",$ativo);
            $stm->bindParam("login",$login);
            $stm->bindParam("senha",$senha);
            $stm->bindParam("id",$id);
            
            if($stm->execute()){
                // fim edição usuário
                
                // edição administrador
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
                if($stm->execute()){
                    $this->pdo->commit();
                }else
                    throw new \PDOException("Erro ao editar administrador");
            }else
                throw new \PDOException("Erro ao editar usuário de administrador");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nErro ao editar administrador: ".$e->getMessage());
        }
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
        $usuario->setAtivo($rowRs["ativo"]);
        $usuario->setLogin($rowRs["login"]);
        $usuario->setSenha($rowRs["senha"]);
        $adm->setUsuario($usuario);
        return $adm;
    }

    protected  function getSqlRead()
    {
        return "select  a.id as id, a.gral_acesso, a.usuario_id, u.ativo, u.login, u.senha
                from adm as a inner join usuario as u on (a.usuario_id = u.id)
                where u.ativo = 1 
                and CONCAT(a.gral_acesso, u.login) like :busca";
    }
    
    /**
     * exclusão lógica
     * {@inheritDoc}
     * @see \dao\Dao::getSqlDelete()
     */
    protected function getSqlDelete()
    {
        return "UPDATE adm as a
                INNER JOIN usuario as u on(a.usuario_id = u.id)
                SET u.ativo = 0
                WHERE a.id = :id";
    }
   
    protected function getUpdateInputParameters($entity)
    {}

    protected function getCreateInputParameters($entity)
    {}
    
    protected function getSqlUpdate()
    {}

    protected function getSqlCreate()
    {}
}