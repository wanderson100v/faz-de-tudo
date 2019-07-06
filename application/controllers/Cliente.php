<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
	
	private $titulos = array(
		"inicio" => "Inicio",
		"perfil" => "Perfil",
		"solicitacoes" => "Solicitações"
	);

	private $cliente;

	public function index()
	{
		redirect("cliente/painel");
	}
	public function painel($pagina = "inicio")
	{
		if(isset($this->titulos[$pagina]))
		{
			if(empty($this->cliente))
			{
				$this->load->model("usuario_model");
				$usuario = $this->usuario_model->read_login($_SESSION["logado"]);

				$this->load->model("endereco_model");
				$enderecos = $this->endereco_model->read_usuario_id($usuario["id"]);

				$this->load->model("contato_model");
				$contatos = $this->contato_model->read_usuario_id($usuario["id"]);
				
				$this->load->model("cliente_model");
				$this->cliente = $this->cliente_model->read_usuario_id($usuario["id"]);
				
				$usuario["enderecos"] = $enderecos;
				$usuario["contatos"] = $contatos;
				$this->cliente["usuario"] = $usuario;
				
			}

			$this->load->view('page_top', array( 'titulo' => $this->titulos[$pagina]));
			$this->load->view('cliente/page_nav', array( 'op' => $pagina));
			if($pagina == "perfil")
				$this->load->view('cliente/'.$pagina, array( 'cliente' => $this->cliente));
			else
				$this->load->view('cliente/'.$pagina);
			$this->load->view('page_bottom');
		}else
		{
			$this->load->view('errors/html/error_404',array(
				'heading' => '404 Page Not Found',
				'message' => 'The page you requested was not found.'
			));
		}
	}

	public function editar($id = 0)
	{
		$this->load->view('page_top', array( 'titulo' => "Editar Cliente"));
		$this->load->view('cliente/page_nav', array( 'op' =>"perfil"));
		$this->load->view('cliente/edit_cliente');
		$this->load->view('page_bottom');
	}

	public function create()
	{
		$tipo = $this->input->post('tipo');
		$sexo = $this->input->post('sexo');
		$nome = trim($this->input->post('nome'));
		$cpfCnpj = trim($this->input->post('cpfCnpj'));
		$nasc = $this->input->post('nasc');
		$login = trim($this->input->post('login'));
		$senha = trim($this->input->post('senha'));

		//campos requeridos
		if(empty($tipo))
		{

		}

		$this->load->model("cliente_model");
		$this->cliente_model->create($tipo, $cpf_cnpj, $nome, $nasc , $sexo, $login, $senha);
		
	}
}
