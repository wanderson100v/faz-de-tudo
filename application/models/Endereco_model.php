<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco_model extends CI_Model{

    public $id;
    public $cep;
    public $num;
    public $logradouro;
    public $bairro;
    public $cidade;
    public $estado;
    public $pais;
    public $usuario_id;

    public function read_usuario_id($id)
    {
        $this->db->select("*");
        $this->db->from("endereco");
        $this->db->where('endereco.usuario_id', $id);
		return $this->db->get()->result_array();
	}

    public function create($endereco)
    {
        if($this->db->insert('endereco', $endereco))
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
		return $this->db->get('endereco');
	}

    public function update($id, $endereco)
    {   
        if($this->db->update('endereco',$endereco, array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao editar contato";
    }

    public function delete($id)
    {
        return ($this->db->delete('endereco', array('id' => $id)))? 
            "Sucesso":
            "Erro ao excluir contato";
	}
}
