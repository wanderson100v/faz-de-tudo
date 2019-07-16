<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade extends CI_Controller {

	public function index()
    {
        $this->load->model("cidade_model");
        $cidades = $this->cidade_model->read();
        $this->load->view('page_top', array( 'titulo' => "Serviços"));
        $this->load->view('adm/page_nav', array( 'op' => 'cidades'));
        $this->load->view('adm/cidades', array( "cidades" => $cidades));
        $this->load->view('page_bottom');
    }

    public function create()
    {	
        
        $cidade = $this->input->post('cidade');
        $estado = $this->input->post('estado');

        if($cidade == "" || $estado == ""){
            echo json_encode(array('estado'=>'danger','msg' =>'A cidade e estado deve ser informado'));
            return;
        }
        
        $this->load->model("cidade_model");
        $msg=  $this->cidade_model->create(array( "nome" => $cidade.'/'.$estado));
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

    public function update()
    {	
        $cidade = array(
            'nome' => $this->input->post('nome')
        );
        $id = $this->input->post('id');

        foreach($cidade as $valor) {//validando requeridos
            if($valor === ""){
                echo json_encode(array('estado'=>'danger','msg' =>'A cidade e estado deve ser informado'));
                return;
            }
        }
        
        $this->load->model("cidade_model");
        $msg=  $this->cidade_model->update($id, $cidade);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->load->model("cidade_model");
        $msg = $this->cidade_model->delete($id);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

}
