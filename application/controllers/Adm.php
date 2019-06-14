<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {
	
	public function index()
	{
		$this->load->view('page_top', array( 'titulo' =>"Inicio"));
		$this->load->view('adm/page_nav', array( 'op' =>"inicio"));
		$this->load->view('adm/inicio');
		$this->load->view('page_bottom');
	}

	public function perfil()
	{
		$this->load->view('page_top', array( 'titulo' =>"Perfil"));
		$this->load->view('adm/page_nav', array( 'op' =>"perfil"));
		$this->load->view('adm/perfil');
		$this->load->view('page_bottom');
	}
	
	public function servicos()
	{
		$this->load->view('page_top', array( 'titulo' =>"Serviços"));
		$this->load->view('adm/page_nav', array( 'op' =>"servicos"));
		$this->load->view('adm/servicos');
		$this->load->view('page_bottom');
	}

	public function cidades()
	{
		$this->load->view('page_top', array( 'titulo' =>"Cidades"));
		$this->load->view('adm/page_nav', array( 'op' =>"cidades"));
		$this->load->view('adm/cidades');
		$this->load->view('page_bottom');
	}

	public function administradores()
	{
		$this->load->view('page_top', array( 'titulo' =>"Administradores"));
		$this->load->view('adm/page_nav', array( 'op' =>"adms"));
		$this->load->view('adm/adms');
		$this->load->view('page_bottom');
	}

}
