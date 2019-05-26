<?php
namespace dao;

use entity\Cliente;
use entity\Usuario;
use entity\Mei;

class MeiDao extends Dao
{
    private $clienteDao;
    
    public function __construct(){
        parent::__construct();
        $this->clienteDao = new ClienteDao();
    }
    /**
     * cadastrando usuário, cliente e mei em cascata
     * {@inheritDoc}
     * @see \dao\Dao::create()
     */
    public function create($entity)
    {
        try{
            $this->pdo->beginTransaction();
            
            //cadastrando usuário
            $usuario = $entity->getCliente()->getUsuario();
            
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
                
                // cadastrando cliente
                $sql = $this->clienteDao->getSqlCreate();
                $stm = $this->pdo->prepare($sql);
                
                $cliente = $entity->getCliente();
                
                $inputParameters = $this->clienteDao->getCreateInputParameters($cliente);
                if($stm->execute($inputParameters)){
                    $cliente->setId($this->pdo->lastInsertId());
                    // fim cadastro cliente
                    
                    // cadastrando MEI
                    $sql = $this->getSqlCreate();
                    $stm = $this->pdo->prepare($sql);
                    
                    $inputParameters = $this->getCreateInputParameters($entity);
                    if($stm->execute($inputParameters)){
                        $entity->setId($this->pdo->lastInsertId());
                        // fim cadastro MEI
                        $this->pdo->commit();
                    }else
                        throw new \PDOException("Erro ao cadastrar MEI");
                }else
                    throw new \PDOException("Erro ao cadastrar cliente");
            }else
                throw new \PDOException("Erro ao cadastrar usuário de cliente");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nOcorreu algum erro ao cadastrar cliente: ".$e->getMessage());
        }
    }
    
    /**
     * editando usuário, cliente e mei em cascata
     * {@inheritDoc}
     * @see \dao\Dao::update()
     */
    public function update($entity)
    {
        try{
            $this->pdo->beginTransaction();
            
            //editando usuário
            $usuario = $entity->getCliente()->getUsuario();
            
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
                
                // edição cliente
                $sql = $this->clienteDao->getSqlUpdate();
                $stm = $this->pdo->prepare($sql);
                
                $cliente = $entity->getCliente();
                $inputParameters = $this->clienteDao->getUpdateInputParameters($cliente);
                if($stm->execute($inputParameters)){
                    // fim edição cliente
                    
                    // edição MEI
                    $sql = $this->getSqlUpdate();
                    $stm = $this->pdo->prepare($sql);
                    
                    $inputParameters = $this->getUpdateInputParameters($entity);
                    if($stm->execute($inputParameters)){
                        // fim edição MEI
                        $this->pdo->commit();
                    }else
                        throw new \PDOException("Erro ao editar MEI");
                }else
                    throw new \PDOException("Erro ao editar administrador");
            }else
                throw new \PDOException("Erro ao editar usuário de administrador");
        }catch (\PDOException $e){
            $this->pdo->rollBack();
            print("\nErro ao editar administrador: ".$e->getMessage());
        }
    }
    
    
    
    protected function getSqlRead()
    {
        return "SELECT m.id , m.cliente_id, c.tipo, c.cpf_cnpj, c.nome, c.nasc, c.sexo,
                	c.usuario_id, u.ativo, u.login, u.senha
                FROM MEI as m
                INNER JOIN CLIENTE as c ON (m.cliente_id = c.id)
                INNER JOIN USUARIO as u ON (c.usuario_id = u.id)
                WHERE u.ativo = 1
                AND CONCAT_WS(c.tipo, c.cpf_cnpj ,c.nome, c.nasc, c.sexo, u.login) like :busca";
    }
    
    protected function castRsObject($rowRs)
    {
        $m = new Mei();
        $m->setId($rowRs['id']);
        
        $c = new Cliente();
        $c->setId($rowRs['cliente_id']);
        $c->setTipo($rowRs['tipo']);
        $c->setCpfCnpj($rowRs['cpf_cnpj']);
        $c->setNome($rowRs['nome']);
        $c->setNasc($rowRs['nasc']);
        $c->setSexo($rowRs['sexo']);
        $m->setCliente($c);
        
        $u = new Usuario();
        $u->setId($rowRs['usuario_id']);
        $u->setAtivo($rowRs["ativo"]);
        $u->setLogin($rowRs["login"]);
        $u->setSenha($rowRs["senha"]);
        $c->setUsuario($u);
        
        return $m;
        
    }
    
    protected function getSqlCreate()
    {
        return "INSERT INTO `fdt`.`mei`
                (`cliente_id`)
                VALUES( :cliente_id)";
        
    }
    
    protected function getCreateInputParameters($entity)
    {
        return array(
            'cliente_id' => $entity->getCliente()->getId()
        );
    }
    
    protected function getSqlUpdate()
    {
        return "UPDATE `fdt`.`mei`
                SET `cliente_id` = :cliente_id
                WHERE `id` = :id";
    }
    
    protected function getUpdateInputParameters($entity)
    {
        return array(
            'id' => $entity->getId(),
            'cliente_id' => $entity->getCliente()->getId()
        );
    }
    
    /**
     * exclusão lógica
     * {@inheritDoc}
     * @see \dao\Dao::getSqlDelete()
     */
    protected function getSqlDelete()
    {
        return "UPDATE mei as m
                INNER JOIN cliente as c on(m.cliente_id = c.id)
                INNER JOIN usuario as u on(c.usuario_id = u.id)
                SET u.ativo = 0
                WHERE m.id = :id";
    }
}

