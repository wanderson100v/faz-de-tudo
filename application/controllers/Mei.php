<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mei extends CI_Controller {
	
	public function index()
	{
		$this->load->view('page_top', array( 'titulo' =>"Inicio"));
		$this->load->view('mei/page_nav', array( 'op' =>"inicio"));
		$this->load->view('mei/inicio');
		$this->load->view('page_bottom');
	}

	public function perfil()
	{
		$this->load->view('page_top', array( 'titulo' =>"Perfil"));
		$this->load->view('mei/page_nav', array( 'op' =>"perfil"));
		$this->load->view('mei/perfil');
		$this->load->view('page_bottom');
	}
	
	public function servicos()
	{
		$this->load->view('page_top', array( 'titulo' =>"Serviços"));
		$this->load->view('mei/page_nav', array( 'op' =>"servicos"));
		$this->load->view('mei/servicos');
		$this->load->view('page_bottom');
	}

	public function cidades()
	{
		$this->load->view('page_top', array( 'titulo' =>"Cidades"));
		$this->load->view('mei/page_nav', array( 'op' =>"cidades"));
		$this->load->view('mei/cidades');
		$this->load->view('page_bottom');
	}

	public function solicitacoes()
	{
		$this->load->view('page_top', array( 'titulo' =>"Solicitações"));
		$this->load->view('mei/page_nav', array( 'op' =>"solicitacao"));
		$this->load->view('mei/solicitacoes');
		$this->load->view('page_bottom');
	}

}
