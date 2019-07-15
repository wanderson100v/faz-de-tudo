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

    public function update($id, $cep, $num, $logradouro, $bairro, $cidade, $estado, $pais)
    {   
        $this->cep = $cep;
        $this->num = $num;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->pais = $pais;
        return $this->db->update('endereco', $this, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete('endereco', $this, array('id' => $id));
	}
}
