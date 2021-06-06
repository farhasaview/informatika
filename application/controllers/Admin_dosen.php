<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dosen extends CI_Controller {

	public $aktif='admin_dosen';

	public function __construct() {
		parent::__construct();

		$this->isLogin();
		$this->clearCache();

		$this->load->model('Model_admin_dosen');
	}
	private function isLogin() {
		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin != 'admin') {
			$msg = array('failed' => 'Silahkan Login');
			$this->session->set_flashdata('msg', $msg['failed']);
			redirect(base_url('login'));
		}
	}

	private function clearCache() {
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Access-Control-Allow-Origin: *");
	}

	public function index()
	{
		$data['aktif'] = $this->aktif;
		$data['all']=$this->Model_admin_dosen->all();
		$data['content']='admin/dosen/list';
		$this->load->view('admin/template/body', $data);
	}

	public function add()
	{
		$data['admin_dosen'] = array(
			'id_dosen' => '',
			'nama' => '',
			'nidn' => '',
			'password' => ''
		);
		$data['aktif'] = $this->aktif;
		$data['title'] = "Buat Akun Dosen";
		$data['content']='admin/dosen/form';
		$this->load->view('admin/template/body', $data);
	}

	public function edit($id){
		$admin_dosen = $this->Model_admin_dosen->find($id);
		$data['admin_dosen'] = array(
			'id_dosen' => $admin_dosen->id_dosen,
			'nama' => $admin_dosen->nama,
			'nidn' => $admin_dosen->nidn,
			'password' => $admin_dosen->password
		);
		$data['aktif'] = $this->aktif;
		$data['title'] = "Edit Akun Dosen";
		$data['content'] = 'admin/dosen/form';
		$this->load->view('admin/template/body', $data);
	}

	public function save() {
		$param = $this->input->post();
		if ($param['id_dosen'] == "") {
			$result = $this->Model_admin_dosen->add($param);
		} else {
			$result = $this->Model_admin_dosen->edit($param);
		}
		$msg = array('success' => 'Data saved successfully');
		$this->session->set_flashdata('msg', $msg['success']);
		redirect(base_url('admin_dosen'));
	}

	public function delete($id) {
		$this->Model_admin_dosen->delete($id);
		redirect(base_url('admin_dosen'));
	}
	
}
