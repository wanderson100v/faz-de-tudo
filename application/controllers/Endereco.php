<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco extends CI_Controller {
	
	public function index()
	{
        
	}
    public function create($persistir = 0)
    {	
        if($persistir){
           
            $this->load->model("usuario_model");
            $usuario =  $this->usuario_model->read_login($_SESSION['logado']);
            
            $endereco = array(
                'cep' => $this->input->post('cep'),
                'num' => $this->input->post('num'),
                'logradouro' => $this->input->post('logradouro'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado'),
                'pais' => $this->input->post('pais'),
                'usuario_id' => $usuario['id'],
            );

			foreach($endereco as $valor) {//validando requeridos
                if($valor == ""){
                    echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
                    return;
                }
			}
            
            $this->load->model("endereco_model");
			$msg=  $this->endereco_model->create($endereco);
			$estado = ($msg == "Sucesso")? "success" : "danger";
			echo json_encode(array('estado'=> $estado,'msg'=> $msg));
        }else{
            $this->load->view('page_top', array( 'titulo' => "Cadastrar endereço"));
            $this->load->view('cliente/page_nav', array( 'op' => "perfil"));
            $this->load->view('persistir_endereco', array( 'desc' => "Cadastrar"));
            $this->load->view('page_bottom');
        }
    }

    public function update($id)
    {	
        
    }

    public function delete($id)
    {
        $this->load->model("endereco_model");
        $msg = $this->endereco_model->delete($id);
        $estado = ($msg == "Sucesso")? "success" : "danger";
        echo json_encode(array('estado'=> $estado,'msg'=> $msg));
    }
}
