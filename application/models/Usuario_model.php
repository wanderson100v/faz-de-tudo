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
        return $query->row_array();

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
        $this->senha = md5($senha);
        $this->ativo = $ativo;
        $this->tipo = $tipo;
    
        $insert = $this->db->insert('usuario', $this);
        if($insert)
        {
            $this->id = $this->db->insert_id();
            return "Sucesso";
        }
        else
        {
            if ($this->db->error()['code'] == 1062) // login já existe
            { 
                return "Login informado não esta disponivel"; 
            } 
            else // Erro não identificado
            {
                return "Ocorreu um erro ao cadastrar usuário"; 
            }
        }
    }

    public function read_id($id )
    {
        $this->db->where('id', $id);
		return $this->db->get('usuario')->row_array();
	}

    public function update($id, $login, $senha, $ativo = true)
    {   
        if($this->db->update('usuario', 
            array(
                'login'=> $login,
                'senha'=> $senha,
                'ativo'=> $ativo
            ), 
            array('id' => $id)))
            return "Sucesso";
        else{
            if ($this->db->error()['code'] == 1062) // login já existe
            { 
                return "Login informado não esta disponivel"; 
            } 
            else // Erro não identificado
            {
                return "Ocorreu um erro ao editar usuário"; 
            }
        }
    }

    /**
     * Exclusão lógica
     */
    public function delete($id){
        if($this->db->update('usuario',array("ativo" => false), array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao excluir usuário";
	}
}