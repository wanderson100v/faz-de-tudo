<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador para ações de tela não autenticada
 */
class HomePage extends CI_Controller {
	
	public $estado = array('','success','danger');

	public $msg_login = 
		array(
			'',
			'Login ou senha não informado',
			'Dados de acesso invalidos',
			'Acesso negado! É necessário estar autenticado',
			'Dados de acesso auterados com sucesso'
		);
		
	public function index()
	{
		$this->load->view('page_top', array( 'titulo' =>"Inicio"));
		$this->load->view('home/home_page_nav', array( 'op' =>"inicio"));
		$this->load->view('home/home_page');
		$this->load->view('page_bottom');
	}

	public function logar($estado_id = 0,$msg_id = 0){
		if($msg_id == 4)
			$this->session->sess_destroy ();
		if(isset($_SESSION["logado"])&& $msg_id != 4)
		{
			redirect(site_url($this->session->tipo));
		}
		else
		{
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

	public function cadastrar($tipo = "geral"){
		if($tipo == "geral" || $tipo == "cliente" || $tipo == "mei")
		{	
			$titulo = "Cadastrar" ;
			$opcao =  "home/cadastro_cliente_mei";			
		
			if($tipo == "cliente")
			{
				$titulo = "Cadastrar Cliente" ;
				$opcao =  "cliente/cadastro";
			}
			else if($tipo == "mei")
			{
				$titulo = "Cadastrar MEI" ;
				$opcao =  "mei/cadastro";
			}
			$this->load->view('page_top', array( 'titulo' => $titulo));
			$this->load->view('home/home_page_nav', array( 'op' =>"cadastro"));
			$this->load->view($opcao);
			$this->load->view('page_bottom');
		}
	}

	public function logout(){
		$this->session->sess_destroy ();
		redirect(site_url("homepage"));
	}
}
