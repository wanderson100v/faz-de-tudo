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
	public function painel($pagina = "inicio")
	{
		if(isset($_SESSION['logado']) && $_SESSION['tipo'] == 'cliente')
		{
			if(isset($this->titulos[$pagina]))
			{
				$this->load->model("usuario_model");
				$usuario = $this->usuario_model->read_login($_SESSION["logado"]);

				$this->load->model("endereco_model");
				$enderecos = $this->endereco_model->read_usuario_id($usuario["id"]);

				$this->load->model("contato_model");
				$contatos = $this->contato_model->read_usuario_id($usuario["id"]);
				
				$this->load->model("cliente_model");
				$cliente = $this->cliente_model->read_usuario_id($usuario["id"]);
				
				$usuario["enderecos"] = $enderecos;
				$usuario["contatos"] = $contatos;
				$cliente["usuario"] = $usuario;

				$this->load->view('page_top', array( 'titulo' => $this->titulos[$pagina]));
				$this->load->view('cliente/page_nav', array( 'op' => $pagina));
				if($pagina == "perfil")
					$this->load->view('cliente/'.$pagina, array( 'cliente' => $cliente));
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
		else
		{
			redirect(site_url('homepage/logar/2/3'));
		}
	}

	public function update($persistir = 0)
	{			
		$this->load->model("cliente_model");
		
		if($persistir)
		{
			$tipo = $this->input->post('tipo');
			$sexo = $this->input->post('sexo');
			$nome = trim($this->input->post('nome'));
			$cpfCnpj = trim($this->input->post('cpfCnpj'));
			$nasc = $this->input->post('nasc');
			$id = trim($this->input->post('id'));

			$msg=  $this->cliente_model->update($id, $tipo, $cpfCnpj, $nome, $nasc , $sexo);
			$estado = ($msg == "Sucesso")? "success" : "danger";
			echo json_encode(array('estado'=> $estado,'msg'=> $msg));
		}else
		{
			$this->load->model("usuario_model");
			$usuario = $this->usuario_model->read_login($_SESSION["logado"]);

			$cliente = $this->cliente_model->read_usuario_id($usuario["id"]);

			$this->load->view('page_top', array( 'titulo' => "Editar Cliente"));
			$this->load->view('cliente/page_nav', array( 'op' =>"perfil"));
			$this->load->view('cliente/edit_cliente', array('cliente' =>$cliente));
			$this->load->view('page_bottom');
		}
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
		$consenha = trim($this->input->post('conSenha'));

		if(empty($nome) || empty($cpfCnpj) || empty($login) || empty($senha) ){//validando requeridos
			echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
			return;
		}
		
		if($senha != $consenha){//validando senha
			echo json_encode(array('estado'=>'danger','msg' =>'Senha e sua confirmação está diferente'));
			return;
		}

		$this->load->model("cliente_model");
		$msg = $this->cliente_model->create($tipo, $cpfCnpj, $nome, $nasc , $sexo, $login, $senha);
		$estado = ($msg == "Sucesso")? "success" : "danger";
		echo json_encode(array('estado'=> $estado,'msg'=> $msg));
	}
}
