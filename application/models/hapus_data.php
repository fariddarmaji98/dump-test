<?php
class hapus_data extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function hapus_satu($field, $key, $table){
		$this->db->where($field, $key);
		$query = $this->db->delete($table);
		return $query;
	}

	public function hapus_semua($table){
		$query = $this->db->query('delete from '.$table.'');
		return $query;
	}
}
?>