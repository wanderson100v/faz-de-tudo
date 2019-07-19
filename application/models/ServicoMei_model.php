<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicoMei_model extends CI_Model{
   
    public $id;
    public $ativo;
    public $valor;
    public $horas;
    public $servico_id;
    public $mei_id;

    public function read_mei_id($id)
    {
        $this->db->select("servico_mei.id ,servico.descricao ,servico_mei.valor ,servico_mei.horas");
        $this->db->from("servico_mei");
        $this->db->join("servico", "servico.id = servico_mei.servico_id");
        $this->db->where('servico_mei.mei_id', $id);
        $this->db->where('servico_mei.ativo', true);
		return $this->db->get()->result_array();
    }
    
    public function read_mei_servico_id($mei_id, $servico_id)
    {
        $this->db->select("servico_mei.*");
        $this->db->from("servico_mei");
        $this->db->join("servico", "servico.id = servico_mei.servico_id");
        $this->db->where('servico_mei.mei_id', $mei_id);
        $this->db->where('servico_mei.servico_id', $servico_id);
		return $this->db->get()->row_array();
	}
    
    public function create($servicoMei)
    {
        if($this->db->insert('servico_mei', $servicoMei))
        {
            $this->id = $this->db->insert_id();
            return "Sucesso";
        }
        else
        {
            return "Ocorreu um erro ao cadastrar uma serviço que o MEI presta" ;
        }
    
    }

    public function update($id, $servicoMei)
    {
        if($this->db->update('servico_mei',$servicoMei, array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao editar serviço do mei";
    }

    //exclusão lógica
    public function delete($id)
    {
        if($this->db->update('servico_mei',array("ativo" => false), array('id' => $id)))
            return "Sucesso";
        else
            return "Ocorreu um erro ao excluir servico do MEI";
    }
    
}