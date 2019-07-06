<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model{
    
    public $id;
    public $tipo;
    public $cpf_cnpj;
    public $nome;
    public $nasc;
    public $sexo;
    public $usuario_id;

    public function read_usuario_id($id)
    {
        $this->db->select("*");
        $this->db->from("cliente");
        $this->db->where('cliente.usuario_id', $id);
		return $this->db->get()->row_array();
	}

    public function create($tipo, $cpf_cnpj, $nome, $nasc , $sexo, $login, $senha, $tipo_usuario = 'cliente')
    {
        $this->load->model('usuario_model');
        $codigo_msg = $this->usuario_id = $this->usuario_model->create($tipo_usuario, $login, $senha);
        if($codigo_msg != 5){
            return $codigo_msg;
        }
        $this->tipo = $tipo;
        $this->cpf_cnpj = $cpf_cnpj;
        $this->nome = $nome;
        $this->nasc = $nasc;
        $this->sexo = $sexo;
        $this->usuario_id = $this->usuario_model->id;
        
        if($this->db->insert('cliente', $this))
        {
            $this->id = $this->db->insert_id();
            return 5; // Sucesso ao cadastrar
        }
        else
        {
            return 4 ; // Ocorreu um erro ao cadastrar cliente
        }
        
    }

    public function read_id($id){
        $this->db->select("*");
        $this->db->from("cliente");
        $this->db->join('usuario', 'usuario.id = cliente.usuario_id');
        $this->db->where('usuario.ativo', true);
        $this->db->where('cliente.id', $id);
		return $this->db->get();
	}

    public function update($id, $tipo, $cpf_cnpj, $nome, $nasc , $sexo)
    {
        $this->tipo = $tipo;
        $this->cpf_cnpj = $cpf_cnpj;
        $this->nome = $nome;
        $this->nasc = $nasc;
        $this->sexo = $sexo;
        $this->db->update('cliente', $this, array('id' => $id));
    }
    
}