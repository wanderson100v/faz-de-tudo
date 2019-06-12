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
        $this->db->where("login", $this->login);
        $this->db->where("senha", $this->senha);
    
        $query = $this->db->get('usuario', 1);
        if ($query->num_rows() >= 1) {
            return TRUE;
        }
        return FALSE;
    }   
}