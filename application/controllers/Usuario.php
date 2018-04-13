<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('Usuario_Model', 'usuarioM');
    }
	
	public function index(){
		redirect('home');
	}
	
	public function logar(){
		$dados = $this->input->post();
		$usuario = $this->usuarioM->logar($dados['usuario'], md5($dados['senha']));
		if ($usuario) {
			unset($usuario['senha']);
			$this->session->set_userdata($usuario);
		} else {
			$mensagem = "Usuário ou senha incorreto";
			$tipo = 0;
			$this->session->set_flashdata('mensagem', $mensagem);
			$this->session->set_flashdata('tipo', $tipo);
		}
		redirect('home');
	}
	
	public function deslogar(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
}
