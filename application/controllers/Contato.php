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
            
            $this->load->model("contato_model");
			$msg=  $this->contato_model->create($tipoContato, $descContato, $_SESSION['usuario_id']);
			$estado = ($msg == "Sucesso")? "success" : "danger";
			echo json_encode(array('estado'=> $estado,'msg'=> $msg));
        }else{ // mostrar tela
            $this->load->view('page_top', array( 'titulo' => "Cadastrar contato"));
            $this->load->view('cliente/page_nav', array( 'op' => "perfil"));
            $this->load->view('persistir_contato', array( 'desc' => "Cadastrar"));
            $this->load->view('page_bottom');
        }
    }

    public function update()
    {	
        $contato = array(
            'descricao' => $this->input->post('descContato')
        );

        $id = $this->input->post('id');

        if(empty($contato['descricao'])){//validando requeridos
            echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
            return;
        }
        
        $this->load->model("contato_model");
        $msg =  $this->contato_model->update($id, $contato);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->load->model("contato_model");
        $msg = $this->contato_model->delete($id);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }
}
