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

	private $mei;

	public function index()
	{
		redirect("mei/painel");
	}
	public function painel($pagina = "inicio"){
		
		if(isset($_SESSION['logado'])&& $_SESSION['tipo'] == 'mei')
		{
			if(isset($this->titulos[$pagina]))
			{
				if(empty($this->mei))
				{
					$this->load->model("usuario_model");
					$usuario = $this->usuario_model->read_login($_SESSION["logado"]);

					$this->load->model("endereco_model");
					$enderecos = $this->endereco_model->read_usuario_id($usuario["id"]);

					$this->load->model("contato_model");
					$contatos = $this->contato_model->read_usuario_id($usuario["id"]);
					
					$this->load->model("cliente_model");
					$cliente = $this->cliente_model->read_usuario_id($usuario["id"]);

					$this->load->model("mei_model");
					$this->mei = $this->mei_model->read_cliente_id($cliente["id"]);
					
					$usuario["enderecos"] = $enderecos;
					$usuario["contatos"] = $contatos;
					$cliente["usuario"] = $usuario;
					$this->mei["cliente"] = $cliente;
			
				}

				$this->load->view('page_top', array( 'titulo' => $this->titulos[$pagina]));
				$this->load->view('mei/page_nav', array( 'op' => $pagina));
				
				if($pagina == "perfil")
					$this->load->view('mei/'.$pagina, array( 'mei' => $this->mei));
				else
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
		else
		{
			redirect(site_url('homepage/logar/2/3'));
		}
	}
}
