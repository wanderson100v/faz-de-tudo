<?php
namespace dao;

use entity\Cliente;
use entity\Usuario;
use PDO;

class ClienteDao extends Dao
{
    
    public function buscarUsuario($login)
    {
        try{
            $stm = $this->pdo->prepare(
                "SELECT c.id, c.tipo, c.cpf_cnpj, c.nome, c.nasc, c.sexo,
                    c.usuario_id, u.ativo, u.login, u.senha 
                FROM CLIENTE as c 
                INNER JOIN USUARIO as u ON (c.usuario_id = u.id)
                WHERE u.ativo = 1 
                AND u.login = :login"
            );

            $stm->bindParam("login",$login);
          
            if($stm->execute()){
                $rowRs = $stm->fetch(PDO::FETCH_ASSOC);
                if(!empty($rowRs)){
                    $usuario = $this->castRsObject($rowRs);
                    return $usuario;
                }
            }
        }catch(\PDOException $e){
            echo "Ocorreu um erro ao buscar dados de Usuário de Cliente :"
            .((isset($e->errorInfo[2]))?$e->errorInfo[2]: $e->getMessage());
        }
    }


    /**
     * cadastrando usu�rio e cliente em cascata
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
                 VALUES(:login, :senha)");
            $stm->bindParam("login",$login);
            $stm->bindParam("senha",$senha);
            
            if($stm->execute()){
                $usuario->setId($this->pdo->lastInsertId());
                //fim cadastro usu�rio
                
                // cadastrando cliente
                $sql = $this->getSqlCreate();
                $stm = $this->pdo->prepare($sql);
                
                $inputParameters = $this->getCreateInputParameters($entity);
                if($stm->execute($inputParameters)){
                    $entity->setId($this->pdo->lastInsertId());
                    $this->pdo->commit();
                    return "Sucesso ao cadastrar cliente";
                }else
                    throw new \PDOException("Erro ao cadastrar cliente");
            }else
                throw new \PDOException("Erro ao cadastrar usuário de cliente");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            return "Ocorreu algum erro ao cadastrar cliente :"
                .((isset($e->errorInfo[2]))?$e->errorInfo[2]: $e->getMessage());
        }
    }
    
    /**
     * editando usu�rio e cliente em cascata
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
                echo "*Usuário editado com sucesso!<br>";
                
                // edi��o cliente
                $sql = $this->getSqlUpdate();
                $stm = $this->pdo->prepare($sql);
                
                $inputParameters = $this->getUpdateInputParameters($entity);
                if($stm->execute($inputParameters)){
                    $this->pdo->commit();
                    echo "*Cliente editado com sucesso!<br>";
                }else
                    throw new \PDOException("Erro ao editar administrador");
            }else
                throw new \PDOException("Erro ao editar usu�rio de administrador");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            echo "Ocorreu algum erro ao editar cliente :"
                .((isset($e->errorInfo[2]))?$e->errorInfo[2]: $e->getMessage());
        }
    }
    
    
    
    protected function getSqlRead()
    {
        return "SELECT c.id, c.tipo, c.cpf_cnpj, c.nome, c.nasc, c.sexo,
                	c.usuario_id, u.ativo, u.login, u.senha 
                FROM CLIENTE as c 
                INNER JOIN USUARIO as u ON (c.usuario_id = u.id)
                WHERE u.ativo = 1 
                AND CONCAT_WS(c.tipo, c.cpf_cnpj ,c.nome, c.nasc, c.sexo, u.login) like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $c = new Cliente();
        $c->setId($rowRs['id']);
        $c->setTipo($rowRs['tipo']);
        $c->setCpfCnpj($rowRs['cpf_cnpj']);
        $c->setNome($rowRs['nome']);
        $c->setNasc($rowRs['nasc']);
        $c->setSexo($rowRs['sexo']);
        
        $u = new Usuario();
        $u->setId($rowRs['usuario_id']);
        $u->setAtivo($rowRs["ativo"]);
        $u->setLogin($rowRs["login"]);
        $u->setSenha($rowRs["senha"]);
        $c->setUsuario($u);
        
        return $c;
        
    }
    
    public function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`cliente`
                (`tipo`,`cpf_cnpj`,`nome`,`nasc`,`sexo`,`usuario_id`)
                VALUES( :tipo, :cpf_cnpj, :nome, :nasc, :sexo, :usuario_id)";
        
    }
    
    public function getCreateInputParameters($entity)
    {
        return array(
            'tipo' => $entity->getTipo(),
            'cpf_cnpj' => $entity->getCpfCnpj(),
            'nome' => $entity->getNome(),
            'nasc' => $entity->getNasc(),
            'sexo' => $entity->getSexo(),
            'usuario_id' => $entity->getUsuario()->getId()
        );
    }
    
    public function getSqlUpdate()
    {
        return "UPDATE `fdt`.`cliente`
                SET `tipo` = :tipo, `cpf_cnpj` = :cpf_cnpj ,`nome` = :nome , 
                `nasc` = :nasc , `sexo` = :sexo, `usuario_id` = :usuario_id
                WHERE `id` = :id";
    }
    
    public function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'tipo' => $entity->getTipo(),
            'cpf_cnpj' => $entity->getCpfCnpj(),
            'nome' => $entity->getNome(),
            'nasc' => $entity->getNasc(),
            'sexo' => $entity->getSexo(),
            'usuario_id' => $entity->getUsuario()->getId()
        );
    }
      
    protected function getSqlDelete()
    {
        return "UPDATE cliente as c
                INNER JOIN usuario as u on(c.usuario_id = u.id)
                SET u.ativo = 0
                WHERE c.id = :id";
    }
}

