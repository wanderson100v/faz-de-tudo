<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicoMei extends CI_Controller {

    
    public function index()
    {
        $this->load->model("servico_model");
        $this->load->model("servicoMei_model");
        $this->load->model("mei_model");

        $servicos = $this->servico_model->read();
        $mei = $this->mei_model->read_usuario_id($_SESSION["usuario_id"]); 
        $servicosMei = $this->servicoMei_model->read_mei_id($mei['id']);
        
        $this->load->view('page_top', array( 'titulo' => "Serviços"));
        $this->load->view('mei/page_nav', array( 'op' => 'servicos'));
        $this->load->view('mei/servicos', array( "servicos" => $servicos , "servicosMei" => $servicosMei));
        $this->load->view('page_bottom');
    }

    public function create()
    {	
        $this->load->model("mei_model");
        $this->load->model("servico_model");

        $mei = $this->mei_model->read_usuario_id($_SESSION["usuario_id"]); 
        $servico = $this->servico_model->read_id($this->input->post('servico_id'));

        $servicoMei = array(
            'valor' => $servico['valor'],
            'horas' => $servico['horas'],
            'ativo' => true,
            'mei_id' => $mei['id'],
            'servico_id' => $servico['id']
        );
        
        foreach($servicoMei as $valor) {//validando requeridos
            if($valor === ""){
                echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
                return;
            }
        }
 
        $this->load->model("servicoMei_model");
        $smExistente = $this->servicoMei_model->read_mei_servico_id($mei["id"],$servico['id']);
        if(!empty($smExistente)){ // verificando se se o serviço que está sendo requisitado cadastro já existe
            if(!$smExistente["ativo"]) // se existe e não esta ativo basta ativar dado que foi feito a exclusão lógica
            {
                $msg=  $this->servicoMei_model->update($smExistente["id"],array("ativo" => true));
                if($msg == "Sucesso"){
                    $estado = "success";
                }else{
                    $estado = "danger";
                    $msg = "Ocorreu um erro ao tentar re-ativar serviço antes desabilitado";
                }
                echo json_encode(array('estado'=> $estado,'msg'=> $msg));
                return;
            }else{ // se existe e está ativo, deve-se apenas informar ao MEI
                echo json_encode(array('estado'=> "danger",'msg'=> "Você já presta o serviço selecionado"));
                return;
            }
        }

        $msg=  $this->servicoMei_model->create($servicoMei);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

    public function update()
    {	
        $servicoMei = array(
            'valor' => $this->input->post('valor'),
            'horas' => $this->input->post('horas')
        );

        $id = $this->input->post('id');
        
        foreach($servicoMei as $valor) {//validando requeridos
            if($valor === ""){
                echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
                return;
            }
        }
        $this->load->model("servicoMei_model");
        $msg=  $this->servicoMei_model->update($id, $servicoMei);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->load->model("servicoMei_model");
        $msg = $this->servicoMei_model->delete($id);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

}
