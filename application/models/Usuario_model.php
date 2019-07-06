<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public $id;
    public $ativo;
    public $tipo;
    public $login;
    public $senha;

    public function autenticar($login, $senha)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->db->where("ativo", true);
        $this->db->where("login", $this->login);
        $this->db->where("senha", $this->senha);
    
        $query = $this->db->get('usuario', 1);
        $row  = $query->row();
        if (isset($row)) {
            return $row->tipo;
        }
        return null;
    }

    public function read_login($login)
    {
        $this->login = $login;
        $this->db->where("ativo", true);
        $this->db->where("login", $this->login);
    
        $query = $this->db->get('usuario', 1);
        return $query->row_array();
    }

    public function create($tipo, $login, $senha, $ativo = true)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->ativo = $ativo;
        $this->tipo = $tipo;
    
        $insert = $this->db->insert('usuario', $this);
        if($insert)
        {
            $this->id = $this->db->insert_id();
            return 5; // Sucesso ao cadastrar
        }
        else
        {
            if ($this->db->error()['code'] == 1062) // login já existe
            { 
                return 2; // Login informado não esta disponivel
            } 
            else // Erro não identificado
            {
                return 3; // Ocorreu um erro ao cadastrar usuário
            }
        }
    }

    public function read($id )
    {
        $this->db->where('id', $id);
		return $this->db->get('usuario');
	}

    public function update($id, $login, $senha, $ativo = true)
    {   
        $this->login = $login;
        $this->senha = $senha;
        $this->ativo = $ativo;
        return $this->db->update('usuario', $this, array('id' => $id));
    }

    /**
     * Exclusão lógica
     */
    public function delete($id){
        $this->ativo = false;
        return $this->db->update('usuario', $this, array('id' => $id));
	}
}