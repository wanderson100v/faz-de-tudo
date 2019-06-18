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

    public function create($tipo, $cpf_cnpj, $nome, $nasc , $sexo, $login, $senha)
    {
            $this->db->trans_begin();

            $this->load->model('usuario_model');
            $this->usuario_id = $this->usuario_model->create($login, $senha);

            $this->tipo = $tipo;
            $this->cpf_cnpj = $cpf_cnpj;
            $this->nome = $nome;
            $this->nasc = $nasc;
            $this->sexo = $sexo;
            
            $this->db->insert('cliente', $this);
            
            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();
            }
            else
            {
                    $this->db->trans_commit();
            }
    }

    public function read_id($id){
        $this->db->select("*");
        $this->db->from("cliente");
        $this->db->join('usuario', 'usuario.id = cliente.usuario_id');
        $this->db->where('usuario.ativo', true);
        $this->db->where('cliente.id', $id);
		$this->db->order_by("id", 'desc');
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