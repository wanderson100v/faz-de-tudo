<?php
namespace dao;

use entity\Cliente;
use entity\Usuario;
use PDO;

class ClienteDao extends Dao
{
    
    public function buscarUsuario($login, $senha){
        print("função chamada");
        try{
            $stm = $this->pdo->prepare(
                "SELECT c.id, c.tipo, c.cpf_cnpj, c.nome, c.nasc, c.sexo,
                    c.usuario_id, u.ativo, u.login, u.senha 
                FROM CLIENTE as c 
                INNER JOIN USUARIO as u ON (c.usuario_id = u.id)
                WHERE u.ativo = 1 
                AND u.login = :login 
                AND u.senha = :senha"
            );

            $stm->bindParam("login",$login);
            $stm->bindParam("senha",$senha);
            print("indo executar");
            if($stm->execute()){
                $rowRs = $stm->fetch(PDO::FETCH_ASSOC);
                if($rowRs != null){
                    $usuario = $this->castRsObject($rowRs);
                    return $usuario;
                }
            }else
                print("não executei");
            return null;
        }catch(\PDOException $e){
            print("\nErro ao buscar: ".$e->getMessage());
        }
    }


    /**
     * cadastrando usuï¿½rio e cliente em cascata
     * {@inheritDoc}
     * @see \dao\Dao::create()
     */
    public function create($entity)
    {
        try{
            $this->pdo->beginTransaction();
            
            //cadastrando usuï¿½rio
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
                //fim cadastro usuï¿½rio
                
                // cadastrando cliente
                $sql = $this->getSqlCreate();
                $stm = $this->pdo->prepare($sql);
                
                $inputParameters = $this->getCreateInputParameters($entity);
                if($stm->execute($inputParameters)){
                    $entity->setId($this->pdo->lastInsertId());
                    $this->pdo->commit();
                }else
                    throw new \PDOException("Erro ao cadastrar cliente");
            }else
                throw new \PDOException("Erro ao cadastrar usuï¿½rio de cliente");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nOcorreu algum erro ao cadastrar cliente: ".$e->getMessage());
        }
    }
    
    /**
     * editando usuï¿½rio e cliente em cascata
     * {@inheritDoc}
     * @see \dao\Dao::update()
     */
    public function update($entity)
    {
        try{
            $this->pdo->beginTransaction();
            
            //editando usuï¿½rio
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
                // fim ediï¿½ï¿½o usuï¿½rio
                
                // ediï¿½ï¿½o cliente
                $sql = $this->getSqlUpdate();
                $stm = $this->pdo->prepare($sql);
                
                $inputParameters = $this->getUpdateInputParameters($entity);
                if($stm->execute($inputParameters)){
                    $this->pdo->commit();
                }else
                    throw new \PDOException("Erro ao editar administrador");
            }else
                throw new \PDOException("Erro ao editar usuï¿½rio de administrador");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nErro ao editar administrador: ".$e->getMessage());
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

