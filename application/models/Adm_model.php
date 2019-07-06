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
    
    public function create($id, $grau_acesso, $login, $senha)
    {
        $this->db->trans_begin();

        $this->load->model('usuario_model');
        $this->usuario_id = $this->usuario_model->create("adm",$login, $senha);

        $this->grau_acesso = $grau_acesso;
        $this->db->insert('adm', $this);
        
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
        $this->db->from("adm");
        $this->db->join('usuario', 'usuario.id = adm.usuario_id');
        $this->db->where('usuario.ativo', true);
        $this->db->where('adm.id', $id);
		$this->db->order_by("id", 'desc');
		return $this->db->get();
	}

    public function update($id, $grau_acesso)
    {
            $this->grau_acesso = $grau_acesso;
            $this->db->update('adm', $this, array('id' => $id));
    }

}