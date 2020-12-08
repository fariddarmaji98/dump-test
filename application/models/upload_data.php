<?php
class upload_data extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function simpan_data_upload($data = array()){
		$query = $this->db->insert('d_file_raport', $data);
		return $query;
	}
}
?>