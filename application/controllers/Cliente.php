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
		$this->load->view('page_top', array( 'titulo' => $this->titulos[$pagina]));
		$this->load->view('cliente/page_nav', array( 'op' => $pagina));
		$this->load->view('cliente/'.$pagina);
		$this->load->view('page_bottom');
	}
}
