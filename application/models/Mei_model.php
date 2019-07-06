<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mei_model extends CI_Model{
    
    public $id;
    public $cliente_id;

    public function read_cliente_id($id)
    {
        $this->db->select("*");
        $this->db->from("mei");
        $this->db->where('mei.cliente_id', $id);
		return $this->db->get()->row_array();
    }
    

    public function create($tipo, $cliente_id, $nome, $nasc , $sexo, $login, $senha)
    { 
        $this->load->model('cliente_model');
        $this->$cliente_id = $this->cliente_model->create($tipo, $cliente_id, $nome, $nasc , $sexo, $login, $senha);
        return $this->db->insert('mei', $this);
    }

    public function read_id($id){
        $this->db->select("*");
        $this->db->from("mei");
        $this->db->where('mei.id', $id);
		return $this->db->get()->row_array();
    }
    
}