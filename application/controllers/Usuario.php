<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		redirect(site_url('usuario/update'));
	}

    public function autenticar(){
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		
		if(empty($login) || empty($senha))
			redirect(site_url("homepage/logar/2/1"));

		$this->load->model('usuario_model');
		$usuario = $this->usuario_model->autenticar($login,md5($senha));
		if(isset($usuario)){
			$this->session->set_userdata(
				array(
					"logado" => $usuario['login'],
					"tipo" => $usuario['tipo'],
					"usuario_id" => $usuario['id']
				)
			);
			redirect(site_url("homepage/logar"));
		}else{
			redirect(site_url("homepage/logar/2/2"));
		}
	}

	public function update($persistir = 0)
	{
		$this->load->model("usuario_model");
		if($persistir)
		{
			$login = $this->input->post('login');
			$senha = $this->input->post('senha');
			$novaSenha = trim($this->input->post('novaSenha'));
			$conSenha = trim($this->input->post('conSenha'));
			$id = trim($this->input->post('id'));

			if(empty($login) || empty($senha) ){//validando requeridos
				echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
				return;
			}
			
			$usuario =  $this->usuario_model->read_id($id);
			$senha = md5($senha);
			if($senha != $usuario["senha"]){ // autenticando
				echo json_encode(array('estado'=>'danger','msg' =>'Senha atual incorreta'));
				return;
			}
			
			if(!empty($novaSenha)){
				if($novaSenha != $conSenha){//validando nova senha
					echo json_encode(array('estado'=>'danger','msg' =>'Nova senha e sua confirmação estão diferentes'));
					return;
				}else
					$senha = $novaSenha;
			}

			$msg=  $this->usuario_model->update($id, $login, $senha);
			$estado = ($msg == "Sucesso")? "success" : "danger";
			echo json_encode(array('estado'=> $estado,'msg'=> $msg));
		}
		else // carregar visão de editar
		{
			$usuario = $this->usuario_model->read_login($_SESSION["logado"]);
			$usuario["senha"] = null;

			$this->load->view('page_top', array( 'titulo' => "Editar Usuário"));
			$this->load->view($_SESSION['tipo'].'/page_nav', array( 'op' =>"perfil"));
			$this->load->view('edit_user', array("usuario" => $usuario));
			$this->load->view('page_bottom');
		}
	}

	public function delete($remover = 0)
    {
		if($remover){
			$this->load->model("usuario_model");
			$usuario = $this->usuario_model->read_id($_SESSION['usuario_id']); 

			$senha = $this->input->post('senha');

			if($usuario["senha"] != md5($senha)){
				echo json_encode(array('estado'=> 'danger','msg'=> "A senha informada esta incorreta"));
				return;
			}
			$msg = $this->usuario_model->delete($usuario["id"]);
			$estado = ($msg == "Sucesso")? "success" : "danger";
			echo json_encode(array('estado'=> $estado,'msg'=> $msg));
			
		}else{
			$this->load->view('page_top', array( 'titulo' => "Desativar conta"));
			$this->load->view($_SESSION['tipo'].'/page_nav', array( 'op' =>"perfil"));
			$this->load->view('apagar_conta');
			$this->load->view('page_bottom');
		}
    }
}
