<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {
	
	public function index()
	{
        redirect(site_url("contato/create"));
	}
	public function create($persistir = 0){	
        if($persistir){
            $tipoContato = $this->input->post('tipoContato');
			$descContato = $this->input->post('descContato');
	
			if(empty($tipoContato) || empty($descContato) ){//validando requeridos
				echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
				return;
			}
                    
            $this->load->model("usuario_model");
			$usuario =  $this->usuario_model->read_login($_SESSION['logado']);
            
            $this->load->model("contato_model");
			$msg=  $this->contato_model->create($tipoContato, $descContato, $usuario['id']);
			$estado = ($msg == "Sucesso")? "success" : "danger";
			echo json_encode(array('estado'=> $estado,'msg'=> $msg));
        }else{ // mostrar tela
            $this->load->view('page_top', array( 'titulo' => "Cadastrar contato"));
            $this->load->view('cliente/page_nav', array( 'op' => "perfil"));
            $this->load->view('persistir_contato', array( 'desc' => "Cadastrar"));
            $this->load->view('page_bottom');
        }
    }

    public function update(){	
     
    }
}
