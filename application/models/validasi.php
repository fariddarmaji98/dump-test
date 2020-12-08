<?php
class validasi extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->model('ambil_data');
	}

	public function cek_admin(){
		if ($this->session->userdata('role') != 'admin') {
			echo "<script>
					alert('Akses tidak diperbolehkan 1');
					window.location ='".base_url()."';
				</script>";
		}
	}

	public function cek_author(){
		if (($this->session->userdata('role') != 'author') and ($this->session->userdata('role') != 'admin')) {
			echo "<script>
					alert('Akses tidak diperbolehkan 2');
					window.location ='".base_url()."';
				</script>";
		}
	}

	public function field_kondisi($field, $table, $kondisi){
		$query = $this->db->query('select '.$field.' from '.$table.' '.$kondisi.' ');
		return $query->result();
	}

	public function cek_login(){
		if($this->session->userdata('isLogin')){
			// echo "<script>
			// 	alert('Selamat datang ".$this->session->userdata('username')."');
			// 	window.location ='".base_url()."index.php/app';
			// </script>";
			// if ($this->session->userdata('role') == 'admin') {
			// }
			// elseif ($this->session->userdata('role') == 'author') {
			// 	echo "<script>
			// 		alert('Selamat datang ".$this->session->userdata('username')."');
			// 		window.location ='".base_url()."index.php/app';
			// 	</script>";
			// }
			// else{
			// 	echo "<script>
			// 		alert('Akses tidak diketahui');
			// 	</script>";
			// 	$this->session->sess_destroy();
			// 	redirect(base_url());
			// }
		}
		else{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
}
?>