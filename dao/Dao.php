<?php
namespace dao;

use PDO;
/**
 * Classe generalizada com operações de CRUD
 * @author wanderson p
 *
 */
abstract class Dao implements IDao
{
    protected  $pdo;
    
    public function __construct()
    {
        $this->pdo = Connection::getMysqlPDO();
    }
    
    public function read($busca)
    {
        $buscaLike = '%'.$busca.'%' ;
        $sql = $this->getSqlRead();
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam("busca",$buscaLike);
        
        if($stm->execute()){
            $adms = array();
            while($rowRs = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($adms,$this->castRsObject($rowRs));
            }return $adms;
        }
    }
    
    /**
     * Converte linha de registro de resultset com o tipo fetch_assoc 
     * para objeto. Tal método é auxiliar para buscas, assim pode-se
     * generalizar.
     * @param $rowRs
     */
    protected abstract function castRsObject($rowRs);
    
    /**
     * @return 'sq1' de busca por busca, ou seja. retorna um sql que
     * possibilita a busca de registros a partir de dados essenciais.
     * @param $rowRs
     */
     protected abstract function getSqlRead();
     
     public function create($entity)
     {
         try{
             $this->pdo->beginTransaction();
             
             $sql = $this->getSqlCreate();
             $stm = $this->pdo->prepare($sql);
            
             $inputParameters = $this->getCreateInputParameters($entity);
             $stm->execute($inputParameters);
             
             $entity->setId($this->pdo->lastInsertId());
             
             $this->pdo->commit();
         }catch (\PDOException $e){
             $this->pdo->rollBack();
             print("\nErro ao cadastrar: ".$e->getMessage());
         }
     }
     
     /**
      * @return 'sql' para inserção
      */
     protected abstract function getSqlCreate();
     
     /**
      *@return 'parametros' para statment
      */
     protected abstract function getCreateInputParameters($entity);
     
     
     public function update($entity)
     {
         try{
             $this->pdo->beginTransaction();
             $sql = $this->getSqlUpdate();
             
             $stm = $this->pdo->prepare($sql);
             
             $inputParameters = $this->getUpdateInputParameters($entity);
             $stm->execute($inputParameters);
             
             $this->pdo->commit();
         }catch (\PDOException $e){
             $this->pdo->rollBack();
             print("\nErro ao editar: ".$e->getMessage());
         }
     }
     
     /**
      * @return 'sql' para edição
      */
     protected abstract function getSqlUpdate();
     
     /**
      *@return 'parametros' para statment
      */
     protected abstract function getUpdateInputParameters($entity);
     
     
     public function delete($entity)
     {
         try{
             $this->pdo->beginTransaction();
             
             $sql = $this->getSqlDelete();
             
             $stm = $this->pdo->prepare($sql);
             $stm->bindValue("id", $entity->getId());
             
             $stm->execute();
             
             $this->pdo->commit();
         }catch (\PDOException $e){
             $this->pdo->rollBack();
             print("\nErro ao excluir: ".$e->getMessage());
         }
     }
     
     /**
      * @return 'sql' para deleção
      */
     protected abstract function getSqlDelete();
     
}

