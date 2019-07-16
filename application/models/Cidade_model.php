<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade_model extends CI_Model{

    public $id;
    public $nome;
    
    public function create($cidade)
    {
        if($this->db->insert('cidade', $cidade))
        {
            $this->id = $this->db->insert_id();
            return "Sucesso";
        }else
        {
            return "Ocorreu um erro ao cadastrar cidade" ;
        }
    }

    public function read_id($id)
    {
        $this->db->where('id', $id);
		return $this->db->get('cidade')->row_array();
    }
    
    public function read()
    {
		return $this->db->get('cidade')->result_array();
	}

    public function update($id, $cidade)
    {
        if($this->db->update('cidade',$cidade, array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao editar cidade";
    }

    public function delete($id)
    {
        return ($this->db->delete('cidade', array('id' => $id)))? 
            "Sucesso":
            "Erro ao excluir cidade possivelmente já existe MEIs a trabalhar nela";
	}
}