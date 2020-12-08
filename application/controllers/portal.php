<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portal extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('ambil_data');
		$this->load->model('validasi');
		$date = date('d/m/Y');
		$time = date('h:i:s');
	}

	public function index()
	{
		$this->load->view('login');
		if (isset($_POST['cek'])) {
			$user = $this->input->post('username');
			$pass = sha1($this->input->post('password'));
			if ($this->input->method() == "post") {
				$query = $this->ambil_data->ambil_kondisi('account', "where username='".$user."' and password='".$pass."' ");
					if (count($query) == 1) {
						var_dump($query);
					if ($query) {
						$session_data = array(
							'isLogin'	=> true,
							'role'		=> $query[0]->role,
							'name'		=> $query[0]->name,
							'username'	=> $query[0]->username);
						$this->session->set_userdata($session_data);
						echo "<script>
							alert('Selamat datang ".$this->session->userdata('username')."');
							window.location ='".base_url()."index.php/app';
						</script>";
					}
				}
				else{
					echo "<script>
							alert('Akses tidak diketahui.');
							window.location ='".base_url()."';
						</script>";
				}
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
