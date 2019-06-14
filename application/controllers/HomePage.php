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
	public $msg_cadastro = array(
		''
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
			if($this->session->tipo == "adm"){
				redirect(site_url("adm"));
			}else if($this->session->tipo == "cliente"){
				redirect(site_url("cliente"));
			}else if($this->session->tipo == "mei"){
				redirect(site_url("mei"));
			}
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

	public function cadastrar($tipo = "geral", $estado_id = 0, $msg_id = 0){
		if($tipo == "geral" || $tipo == "cliente" || $tipo == "mei")
		{	
			if($tipo == "geral")
			{
				$this->load->view('page_top', array( 'titulo' =>"Cadastrar"));
				$this->load->view('home/home_page_nav', array( 'op' =>"cadastro"));
				$this->load->view('home/cadastro_cliente_mei');
				
			}
			else if($tipo == "cliente")
			{
				$this->load->view('page_top', array( 'titulo' =>"Cadastrar Cliente"));
				$this->load->view('home/home_page_nav', array( 'op' =>"cadastro"));
				$this->load->view('cliente/cadastro',
					array( 
						'estado' => ($this->estado[$estado_id]),
						'msg' => ($this->msg_cadastro[$msg_id])
					));
			}
			else if($tipo == "mei")
			{
				$this->load->view('page_top', array( 'titulo' =>"Cadastrar Cliente"));
				$this->load->view('home/home_page_nav', array( 'op' =>"cadastro"));
				$this->load->view('mei/cadastro',
					array( 
						'estado' => ($this->estado[$estado_id]),
						'msg' => ($this->msg_cadastro[$msg_id])
					));
				
			}
			$this->load->view('page_bottom');
		}
	}

	public function logout(){
		$this->session->sess_destroy ();
		redirect(site_url("homepage"));
	}
}
