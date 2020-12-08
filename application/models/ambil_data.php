<?php
class ambil_data extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function field_kondisi($field, $table, $kondisi){
		$query = $this->db->query('select '.$field.' from '.$table.' '.$kondisi.' ');
		return $query->result();
	}

	public function semua_data($table){
		$query = $this->db->get($table);
		return $query->result();
	}

	public function last_id($table,$key){
		$query = $this->db->query('select id from '.$table.' order by id desc limit 1');
		return $query->result();
	}

	public function ambil_kondisi($table,$kondisi){
		$query = $this->db->query('select * from '.$table.' '.$kondisi.'');
		return $query->result();
	}

	public function nilai_join($kondisi){
		/*$query = $this->db->query('select 
			d_nilai.id, d_nilai.semester, d_nilai.rata_rata, d_nilai.total_nilai, 
			d_nilai.ranking, d_siswa.nama_lengkap, d_siswa.photo_siswa, d_kelas.kelas 
			from d_nilai 
			inner join d_siswa on d_nilai.nis=d_siswa.nis 
			inner join d_kelas on d_nilai.id_kelas=d_kelas.id '.$kondisi.'');*/
		$query = $this->db->query('select 
			d_file_raport.file_path, d_file_raport.file_name, d_file_raport.file_format, 
			d_nilai.id, d_nilai.semester, d_nilai.rata_rata, d_nilai.total_nilai, d_nilai.ranking, d_nilai.created_at,
			d_siswa.nama_lengkap, d_siswa.photo_siswa, d_siswa.nis, 
			d_wali_murid.nama_ibu,
			d_kelas.kelas 
			from d_nilai 
			inner join d_siswa on d_nilai.nis=d_siswa.nis 
			inner join d_kelas on d_nilai.id_kelas=d_kelas.id 
			inner join d_file_raport on d_nilai.id_file=d_file_raport.id
			inner join d_wali_murid on d_siswa.no_kk=d_wali_murid.no_kk '.$kondisi.'');
		return $query->result();
	}
}
?>