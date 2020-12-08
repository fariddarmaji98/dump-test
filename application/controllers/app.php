<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class app extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		//$this->load->view('load-style/first.php');
		$this->load->model('upload_data');
		$this->load->model('ambil_data');
		$this->load->model('simpan_data');
		$this->load->model('hapus_data');
		$this->date = date_create();
		$this->load->model('validasi');
		$this->validasi->cek_login();
	}

	public function index(){
		$data = array(
			"account"  => $this->ambil_data->semua_data('account'),
            "post"	   => $this->ambil_data->semua_data('post')); 
		$this->load->view('app.php', $data);
    }

    public function tambah(){
        $this->validasi->cek_admin();
		if ($this->input->method() == 'post') {
			$insert = $this->simpan_data->simpan_satu(array(
				'name'      => $this->input->post('name'),
                'username'  => $this->input->post('username'),
                'password'  => sha1($this->input->post('password')),
                'role'      => 'author'), 'account');
            echo "<script>
					window.location ='".base_url()."index.php/app';
				</script>";
		}
    }
    public function hapus(){
		$this->validasi->cek_admin();
		if ($this->input->method() == "get") {
			$hapus = $this->hapus_data->hapus_satu('username', $_GET['username'], 'account');
			echo "<script>
					window.location ='".base_url()."index.php/app';
				</script>";
		}
    }
    public function ubah(){
		$this->validasi->cek_admin();
		if ($this->input->method() == "post") {
			$ubah = $this->simpan_data->ubah_data('username', $_GET['username'], 'account', array(
				'name'      => $this->input->post('name'),
                'password'  => sha1($this->input->post('password')),
                'role'      => 'author'));
			echo "<script>
					window.location ='".base_url()."index.php/app';
				</script>";
		}
	}
	


    public function tambahpost(){
		$this->validasi->cek_author();
		if ($this->input->method() == 'post') {
			$insert = $this->simpan_data->simpan_satu(array(
				'title'     => $this->input->post('title'),
                'content'   => $this->input->post('content'),
                'date'      => date_format($this->date,"Y/m/d"),
                'username'  => $this->session->userdata('username')), 'post');
            echo "<script>
					window.location ='".base_url()."index.php/app';
				</script>";
		}
    }
    public function ubahpost(){
		$this->validasi->cek_author();
		if ($this->input->method() == "post") {
			$ubah = $this->simpan_data->ubah_data('idpost', $_GET['idpost'], 'post', array(
				'title'     => $this->input->post('title'),
                'content'   => $this->input->post('content'),
                'date'      => date_format($this->date,"Y/m/d"),
                'username'  => $this->session->userdata('username')));
			echo "<script>
					window.location ='".base_url()."index.php/app';
				</script>";
		}
    }
    public function hapuspost(){
		$this->validasi->cek_author();
		if ($this->input->method() == "get") {
			$hapus = $this->hapus_data->hapus_satu('idpost', $_GET['idpost'], 'post');
			echo "<script>
					window.location ='".base_url()."index.php/app';
				</script>";
		}
    }
}
