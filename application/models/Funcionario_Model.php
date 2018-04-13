<?php 

Class Funcionario_Model extends CI_Model {
    
    public function verificarNome($nome, $id){
		$this->db->from('funcionario');
		$this->db->where('nome', $nome);
		$this->db->where('id !=', $id);
        return $this->db->count_all_results();
	}
    
	public function cadastrar($funcionario) {
        return $this->db->insert('funcionario', $funcionario);
    }
	
	public function listar(){
        $this->db->order_by('nome');
        return $this->db->get('funcionario')->result_array();
    }
	
	public function listarAtivos(){
        $this->db->order_by('nome');
		$this->db->where('status', 1);
        return $this->db->get('funcionario')->result_array();
    }
	
	public function buscar($id){
		$this->db->where('id', $id);
        return $this->db->get('funcionario')->row_array();
	}
	
	public function atualizar($funcionario) {
        $this->db->where('id', $funcionario['id']);
		return $this->db->update('funcionario', $funcionario);
    }
}
