<?php 

Class Historico_Model extends CI_Model {
	
	public function buscarUltimo($epi){
		$this->db->select('historico_epi.*');
		$this->db->select('funcionario.nome funcionario');
		$this->db->where('id_epi', $epi);
		$this->db->where('devolucao', null);
		$this->db->join('funcionario', 'historico_epi.id_funcionario = funcionario.id');
		$this->db->join('epi', 'historico_epi.id_epi = epi.id');
		$this->db->order_by('historico_epi.id', 'DESC');
		$this->db->limit(1);
        return $this->db->get('historico_epi')->row_array();
    }
    
	public function listarFuncionario($id) {
		$this->db->select('historico_epi.*');
		$this->db->select('epi.descricao');
		$this->db->select('epi.ca');
		$this->db->select('epi.vencimento');
		$this->db->where('devolucao', null);
		$this->db->where('id_funcionario', $id);
		$this->db->join('epi', 'historico_epi.id_epi = epi.id');
		return $this->db->get('historico_epi')->result_array();
    }
	
	public function listarEpi($id) {
		$this->db->select('historico_epi.*');
		$this->db->select('funcionario.nome');
        $this->db->where('id_epi', $id);
		$this->db->join('funcionario', 'historico_epi.id_funcionario = funcionario.id');
		return $this->db->get('historico_epi')->result_array();
    }
	
	public function entregar($historico) {
        return $this->db->insert('historico_epi', $historico);
    }
	
	public function devolver($historico) {
		$this->db->where('id', $historico['id']);
        return $this->db->update('historico_epi', $historico);
    }
	
}
