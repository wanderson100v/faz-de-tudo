<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato_model extends CI_Model{
    
    public $id;
    public $tipo;
    public $descricao;
    public $usuario_id;

    public function read_usuario_id($id)
    {
        $this->db->select("*");
        $this->db->from("contato");
        $this->db->where('contato.usuario_id', $id);
		return $this->db->get()->result_array();
	}
    
    public function create($tipo, $descricao, $usuario_id)
    {
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->usuario_id = $usuario_id;
        if($this->db->insert('contato', $this))
        {
            $this->id = $this->db->insert_id();
            return "Sucesso";
        }
        else
        {
            return "Ocorreu um erro ao cadastrar contato" ;
        }
    }

    public function read($id)
    {
        $this->db->where('id', $id);
		return $this->db->get('contato');
	}

    public function update($id, $contato)
    {
        if($this->db->update('contato',$contato, array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao editar contato";
    }

    public function delete($id)
    {
        return ($this->db->delete('contato', array('id' => $id)))? 
            "Sucesso":
            "Erro ao excluir contato";
	}
}
