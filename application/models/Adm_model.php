<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_model extends CI_Model{
    
    public $id;
    public $grau_acesso;
    public $usuario_id;

    public function read_usuario_id($id)
    {
        $this->db->select("*");
        $this->db->from("adm");
        $this->db->where('adm.usuario_id', $id);
        return $this->db->get()->row_array();
    }

    
    public function read_id($id){
        $this->db->select("*");
        $this->db->from("adm");
        $this->db->where('adm.id', $id);
		return $this->db->get()->row_array();
    }
    
    public function read(){
        $this->db->select("adm.id, usuario.login, adm.grau_acesso");
        $this->db->from("adm");
        $this->db->join("usuario", "adm.usuario_id = usuario.id");
		return $this->db->get()->result_array();
	}

    
    public function create($grau_acesso, $login, $senha)
    {
        $this->db->trans_begin();

        $this->load->model('usuario_model');
        $msg = $this->usuario_model->create("adm",$login, $senha);
        if($msg != "Sucesso"){
            $this->db->trans_rollback();
            return $msg;
        }
        $this->usuario_id =  $this->usuario_model->id;

        $this->grau_acesso = $grau_acesso;
        
        
        if ($this->db->insert('adm', $this))
        {
            $this->db->trans_commit();
            return "Sucesso";
        }
        else
        {
            $this->db->trans_rollback();
            return "Ocorreu um erro ao cadastrar Administrador";
        }
    }

    public function update($id, $grau_acesso)
    {
            $this->grau_acesso = $grau_acesso;
            $this->db->update('adm', $this, array('id' => $id));
    }

}