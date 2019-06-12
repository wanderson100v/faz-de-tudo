<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador para ações de tela não autenticada
 */
class HomePage extends CI_Controller {
	
	public $estado = array('','success','danger');

	public $msg_login = array(
		'',
		'Login ou senha não informado',
		'Dados de acesso invalidos',
		'Logado com sucesso'
		);

	public function index()
	{
		$this->load->view('page_top', array( 'titulo' =>"Inicio"));
		$this->load->view('home/home_page_nav', array( 'op' =>"inicio"));
		$this->load->view('home/home_page');
		$this->load->view('page_bottom');
	}

	public function logar($estado_id = 0,$msg_id = 0){
		if($this->session->has_userdata("logado")){
			redirect(site_url("homepage/logout"));
		}else{
			$this->load->view('page_top', array( 'titulo' =>"Logar"));
			$this->load->view('home/home_page_nav', array( 'op' =>"login"));
			$this->load->view('home/logar',
				array( 
					'estado' => ($this->estado[$estado_id]),
					'msg' => ($this->msg_login[$msg_id])
				));
			$this->load->view('page_bottom');
		}
		
	}

	public function cadastrar(){
		$this->load->view('page_top', array( 'titulo' =>"Cadastrar"));
		$this->load->view('home/home_page_nav', array( 'op' =>"cadastro"));
		$this->load->view('home/cadastro_cliente_mei');
		$this->load->view('page_bottom');
	}

	public function autenticar(){
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		
		if(empty($login) || empty($senha))
			redirect(site_url("homepage/logar/2/1"));

		$this->load->model('usuario_model');
		if($this->usuario_model->autenticar($login,$senha)){
			$this->session->set_userdata(array("logado" => $login));
			redirect(site_url("homepage/logar"));
		}else{
			redirect(site_url("homepage/logar/2/2"));
		}
	}

	public function logout(){
		$this->session->sess_destroy ();
		redirect(site_url("homepage"));
	}
}
