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

    public function read_usuario_id($usuario_id){
        $this->db->select("mei.id");
        $this->db->from("mei");
        $this->db->join('cliente', "mei.cliente_id = cliente.id");
        $this->db->join('usuario', "cliente.usuario_id = usuario.id");
        $this->db->where('usuario.id', $usuario_id);
		return $this->db->get()->row_array();
    }

    public function create($tipo, $cpfCnpj, $nome, $nasc , $sexo, $login, $senha)
    { 
        $this->db->trans_begin();
        
        $this->load->model('cliente_model');
        $msg =  $this->cliente_model->create($tipo, $cpfCnpj, $nome, $nasc , $sexo, $login, $senha, "mei");
        if($msg != "Sucesso"){
            $this->db->trans_rollback();
            return $msg;
        } 
        $this->cliente_id = $this->cliente_model->id;
       
        if($this->db->insert('mei', $this))
        {
            $this->id = $this->db->insert_id();
            $this->db->trans_commit();
            return "Sucesso";
        }
        else
        {
            $this->db->trans_rollback();
            return "Ocorreu um erro ao cadastrar MEI" ;
        }
    }

    public function read_id($id){
        $this->db->select("*");
        $this->db->from("mei");
        $this->db->where('mei.id', $id);
		return $this->db->get()->row_array();
    }
    
}