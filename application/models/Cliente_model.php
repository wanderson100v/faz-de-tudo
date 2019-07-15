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
        $msg = $this->usuario_id = $this->usuario_model->create($tipo_usuario, $login, $senha);
        if($msg != "Sucesso"){
            return $msg;
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
            return "Sucesso";
        }
        else
        {
            return "Ocorreu um erro ao cadastrar cliente" ;
        }
        
    }

    public function read_id($id){
        $this->db->select("*");
        $this->db->from("cliente");
        $this->db->where('cliente.id', $id);
		return $this->db->get()->row_array();
	}

    public function update($id, $tipo, $cpf_cnpj, $nome, $nasc , $sexo)
    {
        if( $this->db->update('cliente', 
            array(
                'tipo' => $tipo,
                'cpf_cnpj' => $cpf_cnpj,
                'nome' => $nome,
                'nasc' => $nasc,
                'sexo' => $sexo
            ), 
            array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao editar cliente";
    }
    
}