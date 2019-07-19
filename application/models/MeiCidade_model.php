<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MeiCidade_model extends CI_Model
{
    public $id;
    public $cidade_id;
    public $mei_id;

    public function read_mei_id($id)
    {
        $this->db->select("mei_cidade.id ,cidade.nome");
        $this->db->from("mei_cidade");
        $this->db->join("cidade", "cidade.id = mei_cidade.cidade_id");
        $this->db->where('mei_cidade.mei_id', $id);
		return $this->db->get()->result_array();
    }
    
    public function read_mei_cidade_id($mei_id, $cidade_id)
    {
        $this->db->select("mei_cidade.id ,cidade.nome");
        $this->db->from("mei_cidade");
        $this->db->join("cidade", "cidade.id = mei_cidade.cidade_id");
        $this->db->where('mei_cidade.mei_id', $mei_id);
        $this->db->where('mei_cidade.cidade_id', $cidade_id);
		return $this->db->get()->row_array();
	}
    
    public function create($meiCidade)
    {
        if($this->db->insert('mei_cidade', $meiCidade))
        {
            $this->id = $this->db->insert_id();
            return "Sucesso";
        }
        else
        {
            return "Ocorreu um erro ao cadastrar uma cidade de atuação para MEI" ;
        }
    
    }

    public function delete($id)
    {
        return ($this->db->delete('mei_cidade', array('id' => $id)))? 
            "Sucesso":
            "Erro ao excluir cidade do MEI";
	}
}