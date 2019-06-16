<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mei extends CI_Controller {
	
	private $titulos = array(
		"inicio" => "Inicio",
		"servicos" => "Serviços",
		"cidades" => "Cidades",
		"perfil" => "Perfil",
		"solicitacoes" => "Solicitações"
	);

	public function index()
	{
		redirect("mei/painel");
	}
	public function painel($pagina = "inicio"){
		if(isset($this->titulos[$pagina]))
		{
			$this->load->view('page_top', array( 'titulo' => $this->titulos[$pagina]));
			$this->load->view('mei/page_nav', array( 'op' => $pagina));
			$this->load->view('mei/'.$pagina);
			$this->load->view('page_bottom');
		}else
		{
			$this->load->view('errors/html/error_404',array(
				'heading' => '404 Page Not Found',
				'message' => 'The page you requested was not found.'
			));
		}
	}
}
