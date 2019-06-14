<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
	
	public function index()
	{
		$this->load->view('page_top', array( 'titulo' =>"Inicio"));
		$this->load->view('cliente/page_nav', array( 'op' =>"inicio"));
		$this->load->view('cliente/inicio');
		$this->load->view('page_bottom');
	}

	public function perfil(){
		$this->load->view('page_top', array( 'titulo' =>"Perfil"));
		$this->load->view('cliente/page_nav', array( 'op' =>"perfil"));
		$this->load->view('cliente/perfil');
		$this->load->view('page_bottom');
	}
	

	public function solicitacoes(){
		$this->load->view('page_top', array( 'titulo' =>"Solicitações"));
		$this->load->view('cliente/page_nav', array( 'op' =>"solicitacao"));
		$this->load->view('cliente/solicitacoes');
		$this->load->view('page_bottom');
	}

	public function criar(){
		
	}
}
