<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
	
	private $titulos = array(
		"inicio" => "Inicio",
		"perfil" => "Perfil",
		"solicitacoes" => "Solicitações"
	);

	public function index()
	{
		redirect("cliente/painel");
	}
	public function painel($pagina = "inicio"){
		if(isset($this->titulos[$pagina]))
		{
			$this->load->view('page_top', array( 'titulo' => $this->titulos[$pagina]));
			$this->load->view('cliente/page_nav', array( 'op' => $pagina));
			$this->load->view('cliente/'.$pagina);
			$this->load->view('page_bottom');
		}else
		{
			$this->load->view('errors/html/error_404',array(
				'heading' => '404 Page Not Found',
				'message' => 'The page you requested was not found.'
			));
		}
	}

	public function editar($id = 0){
		$this->load->view('page_top', array( 'titulo' => "Editar Cliente"));
		$this->load->view('cliente/page_nav', array( 'op' =>"perfil"));
		$this->load->view('cliente/edit_cliente');
		$this->load->view('page_bottom');
	}
}
