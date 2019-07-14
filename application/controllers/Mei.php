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
		$tipoContato = trim($this->input->post('tipoContato'));
		$descContato = trim($this->input->post('descContato'));

		if(empty($nome) || empty($cpfCnpj) || empty($login) || empty($senha) || empty($descContato)){//validando requeridos
			echo json_encode(array('estado'=>'danger','msg' =>'Um ou mais campos obrigatórios estão vazios'));
			return;
		}
		
		if($senha != $consenha){//validando senha
			echo json_encode(array('estado'=>'danger','msg' =>'Senha e sua confirmação está diferente'));
			return;
		}

		$this->load->model("mei_model");
		$this->load->model("contato_model");
		$this->load->model("cliente_model");

		$msg_cadastro_mei = $this->mei_model->create($tipo, $cpfCnpj, $nome, $nasc , $sexo, $login, $senha);
		$msg_cadastro_contato = "";
		
		if($msg_cadastro_mei == "Sucesso"){
			$estado = "success";
			$msg_cadastro_mei .= "ao cadastrar MEI";
			
			$cliente = $this->cliente_model->read_id($this->mei_model->cliente_id);
	
			$msg_cadastro_contato = $this->contato_model->create($tipoContato, $descContato,$cliente['usuario_id']);
			$msg_cadastro_contato = 
			($msg_cadastro_contato == "Sucesso")? 
			", e contato cadastrado com sucesso":
			", e ocorreu um erro ao cadastrar contato, cadastre assim que possível, assim, poderemos entrar em contato";
		}else{
			$estado ="danger";
		}
		

		echo json_encode(array('estado'=> $estado,'msg'=> ($msg_cadastro_mei."".$msg_cadastro_contato)));
	}
}
