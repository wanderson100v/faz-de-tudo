<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco extends CI_Controller {
	
	public function index()
	{
        
	}
	public function persistir($id = 0){	
        if($id == 0){
            $this->load->view('page_top', array( 'titulo' => "Cadastrar endereço"));
            $this->load->view('cliente/page_nav', array( 'op' => "perfil"));
            $this->load->view('persistir_endereco', array( 'desc' => "Cadastrar"));
            $this->load->view('page_bottom');
        }else{
            $this->load->view('page_top', array( 'titulo' => "Editar endereço"));
            $this->load->view('cliente/page_nav', array( 'op' => "perfil"));
            $this->load->view('persistir_endereco', array( 'desc' => "Editar"));
            $this->load->view('page_bottom');
        }
    }

    public function remover($id){	
   
    }

    public function buscar(){	

    }
}
