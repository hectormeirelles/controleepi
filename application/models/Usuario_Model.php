<?php 

Class Usuario_Model extends CI_Model {
		
	public function logar($usuario, $senha){
		$this->db->where('UPPER(usuario)', strtoupper($usuario));
		$this->db->where('senha', $senha);
		return $this->db->get('usuario')->row_array();
	}
	
}
