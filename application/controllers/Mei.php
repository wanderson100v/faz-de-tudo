<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mei extends CI_Controller {
	
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

	public function cadastrar(){
		$this->load->view('page_top', array( 'titulo' =>"Cadastrar Cliente"));
		$this->load->view('home/home_page_nav', array( 'op' =>"cadastro"));
		$this->load->view('mei/cadastro');
		$this->load->view('page_bottom');
	}
}
