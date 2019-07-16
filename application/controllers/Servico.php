<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

	public function index()
    {
        $this->load->model("servico_model");
        $servicos = $this->servico_model->read();
        
        $this->load->view('page_top', array( 'titulo' => "Serviços"));
        $this->load->view('adm/page_nav', array( 'op' => 'servicos'));
        $this->load->view('adm/servicos', array( "servicos" => $servicos));
        $this->load->view('page_bottom');
    }

    public function create()
    {	
        $servico = array(
            'valor' => $this->input->post('valor'),
            'descricao' => $this->input->post('descricao'),
            'horas' => $this->input->post('horas'),
            'ativo' => true,
        );

        foreach($servico as $valor) {//validando requeridos
            if($valor === ""){
                echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
                return;
            }
        }
        
        $this->load->model("servico_model");
        $msg=  $this->servico_model->create($servico);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

    public function update()
    {	
        $servico = array(
            'valor' => $this->input->post('valor'),
            'descricao' => $this->input->post('descricao'),
            'horas' => $this->input->post('horas'),
        );
        $id = $this->input->post('id');

        foreach($servico as $valor) {//validando requeridos
            if($valor == ""){
                echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
                return;
            }
        }
        
        $this->load->model("servico_model");
        $msg=  $this->servico_model->update($id, $servico);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->load->model("servico_model");
        $msg = $this->servico_model->delete($id);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

}
