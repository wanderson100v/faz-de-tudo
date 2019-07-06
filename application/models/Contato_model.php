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
    
    public function create($tipo, $descricao)
    {
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        return $this->db->insert('contato', $this);
    }

    public function read($id)
    {
        $this->db->where('id', $id);
		return $this->db->get('contato');
	}

    public function update($id, $tipo, $descricaoe)
    {   
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        return $this->db->update('contato', $this, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete('contato', $this, array('id' => $id));
	}
}
