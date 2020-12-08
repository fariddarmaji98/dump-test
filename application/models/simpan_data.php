<?php
class simpan_data extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function simpan_satu($data = array(), $table){
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function simpan_banyak($table,$data){
		$query = $this->db->insert_batch($table, $data);
		return $query;
	}

	public function ubah_data($field, $key, $table, $data){
		$this->db->where($field, $key);
		$query = $this->db->update($table, $data);
		return $query;
	}
}
?>