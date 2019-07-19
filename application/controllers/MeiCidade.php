<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MeiCidade extends CI_Controller {

	public function index()
    {
        $this->load->model("cidade_model");
        $this->load->model("meiCidade_model");
        $this->load->model("mei_model");

        $cidades = $this->cidade_model->read();
        $mei = $this->mei_model->read_usuario_id($_SESSION["usuario_id"]); 
        $cidadesMei = $this->meiCidade_model->read_mei_id($mei['id']);
        
        $this->load->view('page_top', array( 'titulo' => "Cidades"));
        $this->load->view('mei/page_nav', array( 'op' => 'cidades'));
        $this->load->view('mei/cidades', array( "cidades" => $cidades , "cidadesMei" => $cidadesMei));
        $this->load->view('page_bottom');
    }

    public function create()
    {	
        $this->load->model("mei_model");

        $mei = $this->mei_model->read_usuario_id($_SESSION["usuario_id"]); 

        $cidadeMei = array(
            'mei_id' => $mei['id'],
            'cidade_id' => $this->input->post('cidade_id')
        );
        
        foreach($cidadeMei as $valor) {//validando requeridos
            if($valor === ""){
                echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
                return;
            }
        }
 
        $this->load->model("meiCidade_model");
        if(!empty($this->meiCidade_model->read_mei_cidade_id($cidadeMei['mei_id'], $cidadeMei["cidade_id"]))){
            echo json_encode(array('estado'=> "danger",'msg'=> "Você já trabalha na cidade selecionada"));
            return;
        }
       
        $msg=  $this->meiCidade_model->create($cidadeMei);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->load->model("meiCidade_model");
        $msg = $this->meiCidade_model->delete($id);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

}
