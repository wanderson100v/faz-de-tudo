<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public $id;
    public $ativo;
    public $login;
    public $senha;

    public function autenticar($login, $senha){
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

    public function create($login, $senha)
    {
            $this->login = $login;
            $this->senha = $senha;
            if($this->db->insert('usuario', $this))
                return $this->db->insert_id();
            return null;
    }

    public function read($id = null){
		
		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('usuario');
	}

    public function update($id, $login, $senha, $ativo = true)
    {   
            $this->login = $login;
            $this->senha = $senha;
            $this->ativo = $ativo;
            $this->db->update('usuario', $this, array('id' => $id));
    }

    /**
     * Exclusão lógica
     */
    public function delete($id){
        $this->ativo = false;
        $this->db->update('usuario', $this, array('id' => $id));
	}
}