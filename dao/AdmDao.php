<?php
namespace dao;

use entity\Adm;
use entity\Usuario;
use PDO;

class AdmDao extends Dao
{
    public function buscarUsuario($login)
    {
        
        try{
            $stm = $this->pdo->prepare(
                "select  a.id as id, a.gral_acesso, a.usuario_id, u.ativo, u.login, u.senha
                from adm as a inner join usuario as u on (a.usuario_id = u.id)
                where u.ativo = 1
                AND u.login = :login"
                );
            
            $stm->bindParam("login",$login);
            
            if($stm->execute()){
                $rowRs = $stm->fetch(PDO::FETCH_ASSOC);
                if(!empty($rowRs)){
                    return $this->castRsObject($rowRs);
                }
            }
        }catch(\PDOException $e){
            print "Ocorreu um erro ao buscar dados de Usuário de Administrador :"
            .((isset($e->errorInfo[2]))?$e->errorInfo[2]: $e->getMessage());
        }
    }
    
    /**
     * cadastrando usu�rio e administrador em cascata
     * {@inheritDoc}
     * @see \dao\Dao::create()
     */
    public function create($entity)
    {
        try{
            $this->pdo->beginTransaction();
            
            //cadastrando usu�rio
            $usuario = $entity->getUsuario();
            
            $login = $usuario->getLogin();
            $senha = $usuario->getSenha();
            
            $stm = $this->pdo->prepare(
                "INSERT INTO `fdt`.`usuario` (`login`, `senha`)
                 VALUES(:login, :senha)"
                );
            $stm->bindParam("login",$login);
            $stm->bindParam("senha",$senha);
            
            if($stm->execute()){
                $usuario->setId($this->pdo->lastInsertId());
                //fim cadastro usu�rio
                
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
                    return "Sucesso ao cadastrar novo Administrador";
                }else
                    throw new \PDOException("Erro ao cadastrar administrador");
            }else 
                throw new \PDOException("Erro ao cadastrar usu�rio de administrador");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            return "Ocorreu algum erro ao cadastrar Administrador :"
            .((isset($e->errorInfo[2]))?$e->errorInfo[2]: $e->getMessage());
        }
    }
    
    /**
     * editando usu�rio e administrador em cascata
     * {@inheritDoc}
     * @see \dao\Dao::update()
     */
    public function update($entity)
    {
        try{
            $this->pdo->beginTransaction();
            
            //editando usu�rio
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
                // fim edi��o usu�rio
               
                // edi��o administrador
                $gralAcesso = $entity->getGralAcesso();
                $usuarioId = $entity->getUsuario()->getId();
                $id = $entity->getId();
                
                $stm = $this->pdo->prepare(
                    "UPDATE `fdt`.`adm`
                    SET `gral_acesso` = :gral_acesso, `usuario_id` =:usuario_id
                    WHERE `id` = :id");
                $stm->bindParam("gral_acesso",$gralAcesso);
                $stm->bindParam("usuario_id", $usuarioId);
                $stm->bindParam("id", $id);
                if($stm->execute()){
                    $this->pdo->commit();
                    return "*Sucesso ao editar adm!<br>";
                }else
                    throw new \PDOException("Erro ao editar administrador");
            }else
                throw new \PDOException("Erro ao editar usu�rio de administrador");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            return "Ocorreu algum erro ao editar administrador :"
                .((isset($e->errorInfo[2]))?$e->errorInfo[2]: $e->getMessage());
        }
    }
 
    /**
     * busca atrav�s de login de usuario e gral de acesso
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

    protected function getSqlReadId()
    {
        return "select  a.id as id, a.gral_acesso, a.usuario_id, u.ativo, u.login, u.senha
                from adm as a inner join usuario as u on (a.usuario_id = u.id)
                where u.ativo = 1 
                and a.id = :id";
    }

    protected  function getSqlRead()
    {
        return "select  a.id as id, a.gral_acesso, a.usuario_id, u.ativo, u.login, u.senha
                from adm as a inner join usuario as u on (a.usuario_id = u.id)
                where u.ativo = 1 
                and CONCAT_WS(a.gral_acesso, u.login) like :busca";
    }
    
    /**
     * exclus�o l�gica
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