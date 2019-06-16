<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {
	
	public function index()
	{
        
	}
	public function persistir($id = 0){	
        if($id == 0){
            $this->load->view('page_top', array( 'titulo' => "Cadastrar contato"));
            $this->load->view('cliente/page_nav', array( 'op' => "perfil"));
            $this->load->view('persistir_contato', array( 'desc' => "Cadastrar"));
            $this->load->view('page_bottom');
        }else{
            $this->load->view('page_top', array( 'titulo' => "Editar contato"));
            $this->load->view('cliente/page_nav', array( 'op' => "perfil"));
            $this->load->view('persistir_contato', array( 'desc' => "Editar"));
            $this->load->view('page_bottom');
        }
    }

    public function remover($id){	

    }

    public function buscar(){	
     
    }
}
