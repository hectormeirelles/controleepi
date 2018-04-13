<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Epi extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->has_userdata('usuario')){
			$this->load->model('Epi_Model', 'epiM');
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
			$dados['pagina'] = 'cadastro-epi.php';
			$this->load->view('estrutura.php', $dados);
		} else {
			redirect('home');
		}
	}
	
	public function cadastrar(){
		$dados = $this->input->post();
		if($this->epiM->verificarCa($dados['ca'], 0) == 0) {
			$dados['vencimento'] = implode("-", array_reverse(explode("/", $dados['vencimento'])));
			if ($this->epiM->cadastrar($dados)) {
				$mensagem = "Epi cadastrado corretamente";
				$tipo = 1;
			} else {
				$mensagem = "Epi não cadastrado";
				$tipo = 0;
			}
		} else {
			$mensagem = "Epi já cadastrado";
			$tipo = 0;
		}
		
		$this->session->set_flashdata('mensagem', $mensagem);
		$this->session->set_flashdata('tipo', $tipo);
		
		redirect('epi/cadastro');
	}
	
	public function edicao($id){
		$dados['epi'] = $this->epiM->buscar($id);
		$dados['epi']['vencimento'] = implode("/", array_reverse(explode("-", $dados['epi']['vencimento'])));
		$dados['pagina'] = 'edicao-epi.php';
		$this->load->view('estrutura.php', $dados);
	}
	
	public function editar(){
		$dados = $this->input->post();
		if($this->epiM->verificarCa($dados['ca'], $dados['id']) == 0) {
			$dados['vencimento'] = implode("-", array_reverse(explode("/", $dados['vencimento'])));
			if ($this->epiM->atualizar($dados)) {
				$mensagem = "Epi atualizado corretamente";
				$tipo = 1;
			} else {
				$mensagem = "Epi não atualizado";
				$tipo = 0;
			}
		} else {
			$mensagem = "Já exite outro epi com este CA";
			$tipo = 0;
		}
		
		$this->session->set_flashdata('mensagem', $mensagem);
		$this->session->set_flashdata('tipo', $tipo);
		
		if($tipo){
			redirect('epi/listagem');
		} else {
			redirect('epi/edicao/'.$dados['id']);
		}
	}
	
	public function entregues(){
		$epis = $this->epiM->listarEntregues();
		$this->load->model('Historico_Model', 'historicoM');
		foreach ($epis as $key => $epi){
			$epis[$key]['historico'] = $this->historicoM->buscarUltimo($epi['id']);
			if($epis[$key]['historico'] == null){
				unset($epis[$key]);
			} else {
				if($epis[$key]['historico']['devolucao'] != null){
					unset($epis[$key]);
				}
			}
		}
		$this->load->model('Funcionario_Model', 'funcionarioM');
		$dados['funcionarios'] = $this->funcionarioM->listarAtivos();
		$dados['epis'] = $epis;
		$dados['pagina'] = 'listagem-epi-entregues.php';
		$this->load->view('estrutura.php', $dados);
	}
	
	public function disponiveis(){
		$epis = $this->epiM->listarDisponiveis();
		$this->load->model('Historico_Model', 'historicoM');
		foreach ($epis as $key => $epi){
			$epis[$key]['historico'] = $this->historicoM->buscarUltimo($epi['id']);
			if($epis[$key]['historico'] != null){
				if($epis[$key]['historico']['devolucao'] == null){
					unset($epis[$key]);
				}
			}
		}
		$this->load->model('Funcionario_Model', 'funcionarioM');
		$dados['funcionarios'] = $this->funcionarioM->listarAtivos();
		$dados['epis'] = $epis;
		$dados['pagina'] = 'listagem-epi-disponiveis.php';
		$this->load->view('estrutura.php', $dados);
	}
	
	public function vencidos(){
		$epis = $this->epiM->listarVencidos();
		$this->load->model('Historico_Model', 'historicoM');
		foreach ($epis as $key => $epi){
			$epis[$key]['historico'] = $this->historicoM->buscarUltimo($epi['id']);
		}
		$this->load->model('Funcionario_Model', 'funcionarioM');
		$dados['funcionarios'] = $this->funcionarioM->listarAtivos();
		$dados['epis'] = $epis;
		$dados['pagina'] = 'listagem-epi-vencidos.php';
		$this->load->view('estrutura.php', $dados);
	}
	
}
