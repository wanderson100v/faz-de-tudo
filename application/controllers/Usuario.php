<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		$this->load->view('page_top', array( 'titulo' =>"Inicio"));
		$this->load->view('cliente/page_nav', array( 'op' =>"inicio"));
		$this->load->view('cliente/inicio');
		$this->load->view('page_bottom');
	}

    public function autenticar(){
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		
		if(empty($login) || empty($senha))
			redirect(site_url("homepage/logar/2/1"));

		$this->load->model('usuario_model');
		$tipo = $this->usuario_model->autenticar($login,$senha);
		if(isset($tipo)){
			$this->session->set_userdata(
				array(
					"logado" => $login,
					"tipo" => $tipo
				)
			);
			redirect(site_url("homepage/logar"));
		}else{
			redirect(site_url("homepage/logar/2/2"));
		}
	}

}
