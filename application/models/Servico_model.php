<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico_model extends CI_Model{
    
    public $id;
    public $ativo;
    public $valor;
    public $horas;
    public $descricao;
 
    public function create($servico)
    {
        if($this->db->insert('servico', $servico))
        {
            $this->id = $this->db->insert_id();
            return "Sucesso";
        }else
        {
            return "Ocorreu um erro ao cadastrar servico" ;
        }
    }

    public function read_id($id)
    {
        $this->db->where('id', $id);
        $this->db->where('ativo', true);
		return $this->db->get('servico')->row_array();
    }
    
    public function read()
    {
        $this->db->where('ativo', true);
		return $this->db->get('servico')->result_array();
	}

    public function update($id, $servico)
    {
        if($this->db->update('servico',$servico, array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao editar servico";
    }

    //exclusão lógica
    public function delete($id)
    {
        if($this->db->update('servico',array("ativo" => false), array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao excluir servico";
	}
   
}