<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historico extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->has_userdata('usuario')){
			$this->load->model('Historico_Model', 'historicoM');
		} else {
			redirect('home');
		}
    }
	
	public function index(){
		$dados['pagina'] = 'home.php';
		$this->load->view('estrutura.php', $dados);
	}
	
	public function funcionario($id){
		$this->load->model('Funcionario_Model', 'funcionarioM');
		$dados['funcionario'] = $this->funcionarioM->buscar($id);
		$dados['historicos'] = $this->historicoM->listarFuncionario($id);
		$dados['pagina'] = 'listagem-funcionario-epi.php';
		$this->load->view('estrutura.php', $dados);
	}
	
	public function entregar(){
		$dados = $this->input->post();
		$dados['entrega'] = date('Y-m-d H:i:s');
		if($this->historicoM->entregar($dados)){
			$mensagem = "Epi entregue corretamente";
			$tipo = 1;
		} else {
			$mensagem = "Epi não entregue";
			$tipo = 0;
		}
		
		$this->session->set_flashdata('mensagem', $mensagem);
		$this->session->set_flashdata('tipo', $tipo);
		
		redirect('epi/listagem');
	}
	
	public function devolver($id){
		$dados['id'] = $id;
		$dados['devolucao'] = date('Y-m-d H:i:s');
		if($this->historicoM->devolver($dados)){
			$mensagem = "Epi devolvido corretamente";
			$tipo = 1;
		} else {
			$mensagem = "Epi não devolvido";
			$tipo = 0;
		}
		
		$this->session->set_flashdata('mensagem', $mensagem);
		$this->session->set_flashdata('tipo', $tipo);
		
		redirect('epi/listagem');
	}
	
	public function epi($id){
		$this->load->model('Epi_Model', 'epiM');
		$dados['epi'] = $this->epiM->buscar($id);
		$dados['historicos'] = $this->historicoM->listarEpi($id);
		$dados['pagina'] = 'historico-epi.php';
		$this->load->view('estrutura.php', $dados);
	}
	
}
