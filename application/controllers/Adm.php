<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {
	
	private $titulos = array(
		"inicio" => "Inicio",
		"servicos" => "Serviços",
		"cidades" => "Cidades",
		"perfil" => "Perfil",
		"adms" => "Administradores"
	);

	public function index()
	{
		redirect("adm/painel");
	}
	public function painel($pagina = "inicio"){
		$this->load->view('page_top', array( 'titulo' => $this->titulos[$pagina]));
		$this->load->view('adm/page_nav', array( 'op' => $pagina));
		$this->load->view('adm/'.$pagina);
		$this->load->view('page_bottom');
	}

}
