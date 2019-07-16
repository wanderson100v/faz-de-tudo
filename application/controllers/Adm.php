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
	public function painel($pagina = "inicio")
	{
		if(isset($_SESSION['logado']) && $_SESSION['tipo'] == 'adm')
		{
			if(isset($this->titulos[$pagina]))
			{
				$dados = null;
				
				if($pagina == "perfil"){
					$this->load->model("usuario_model");
					$usuario = $this->usuario_model->read_login($_SESSION["logado"]);
	
					$this->load->model("contato_model");
					$contatos = $this->contato_model->read_usuario_id($usuario["id"]);
				
					$this->load->model("adm_model");
					$adm = $this->adm_model->read_usuario_id($usuario["id"]);
					
					$usuario["contatos"] = $contatos;
					$adm["usuario"] = $usuario;
					$dados = array("adm" =>$adm);
				}
				
				$this->load->view('page_top', array( 'titulo' => $this->titulos[$pagina]));
				$this->load->view('adm/page_nav', array( 'op' => $pagina));
				
				if(empty($dados)){
					$this->load->view('adm/'.$pagina);
				}else{
					$this->load->view('adm/'.$pagina,$dados);
				}
			
				$this->load->view('page_bottom');
			}
			else
			{
				$this->load->view('errors/html/error_404',array(
					'heading' => '404 Page Not Found',
					'message' => 'The page you requested was not found.'
				));
			}
		}
		else
		{
			redirect(site_url('homepage/logar/2/3'));
		}
		
	}

}
