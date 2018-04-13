<?php 

Class Epi_Model extends CI_Model {
    
	public function verificarCa($ca, $id){
		$this->db->from('epi');
		$this->db->where('ca', $ca);
		$this->db->where('id !=', $id);
        return $this->db->count_all_results();
	}
    
	public function cadastrar($epi) {
        return $this->db->insert('epi', $epi);
    }
	
    public function listarEntregues(){
		$this->db->select('epi.*');
		$this->db->where('status', 1);
        $this->db->order_by('vencimento');
        return $this->db->get('epi')->result_array();
    }
	
	public function listarDisponiveis(){
		$this->db->where('epi.status', 1);
		$this->db->where('UNIX_TIMESTAMP(vencimento) - UNIX_TIMESTAMP(CURDATE()) > 0');
        $this->db->order_by('vencimento');
        return $this->db->get('epi')->result_array();
    }
	
	public function listarVencidos(){
		$this->db->select('epi.*');
		$this->db->where('UNIX_TIMESTAMP(vencimento) - UNIX_TIMESTAMP(CURDATE()) < 0');
		$this->db->where('status', 1);
        $this->db->order_by('vencimento');
        return $this->db->get('epi')->result_array();
    }
	
	public function buscar($id){
		$this->db->where('id', $id);
        return $this->db->get('epi')->row_array();
	}
	
	public function atualizar($funcionario) {
        $this->db->where('id', $funcionario['id']);
		return $this->db->update('epi', $funcionario);
    }
	
}
