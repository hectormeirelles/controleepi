<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->has_userdata('usuario')){
			$this->load->model('Funcionario_Model', 'funcionarioM');
		} else {
			redirect('home');
		}
    }
	
	public function index(){
		$dados['pagina'] = 'home.php';
		$this->load->view('estrutura.php', $dados);
	}
	
	public function cadastro(){
		if($this->session->nivel == 10){
			$dados['pagina'] = 'cadastro-funcionario.php';
			$this->load->view('estrutura.php', $dados);
		} else {
			redirect('home');
		}
	}
	
	public function cadastrar(){
		$dados = $this->input->post();
		if($this->funcionarioM->verificarNome($dados['nome'], 0) == 0) {
			$dados['admissao'] = implode("-", array_reverse(explode("/", $dados['admissao'])));
			if ($this->funcionarioM->cadastrar($dados)) {
				$mensagem = "Funcionário cadastrado corretamente";
				$tipo = 1;
			} else {
				$mensagem = "Funcionário não cadastrado";
				$tipo = 0;
			}
		} else {
			$mensagem = "Funcionário já cadastrado";
			$tipo = 0;
		}
		
		$this->session->set_flashdata('mensagem', $mensagem);
		$this->session->set_flashdata('tipo', $tipo);
		
		redirect('funcionario/cadastro');
	}
	
	public function edicao($id){
		$dados['funcionario'] = $this->funcionarioM->buscar($id);
		$dados['funcionario']['admissao'] = implode("/", array_reverse(explode("-", $dados['funcionario']['admissao'])));
		$dados['pagina'] = 'edicao-funcionario.php';
		$this->load->view('estrutura.php', $dados);
	}
	
	public function editar(){
		$dados = $this->input->post();
		if($this->funcionarioM->verificarNome($dados['nome'], $dados['id']) == 0) {
			$dados['admissao'] = implode("-", array_reverse(explode("/", $dados['admissao'])));
			if ($this->funcionarioM->atualizar($dados)) {
				$mensagem = "Funcionário atualizado corretamente";
				$tipo = 1;
			} else {
				$mensagem = "Funcionário não atualizado";
				$tipo = 0;
			}
		} else {
			$mensagem = "Já exite outro funcionário com este nome";
			$tipo = 0;
		}
		
		$this->session->set_flashdata('mensagem', $mensagem);
		$this->session->set_flashdata('tipo', $tipo);
		
		if($tipo){
			redirect('funcionario/listagem');
		} else {
			redirect('funcionario/edicao/'.$dados['id']);
		}
	}
	
	public function listagem(){
		$dados['funcionarios'] = $this->funcionarioM->listar();
		$dados['pagina'] = 'listagem-funcionario.php';
		$this->load->view('estrutura.php', $dados);
	}
	
}
