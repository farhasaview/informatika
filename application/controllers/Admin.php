<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $aktif='admin';

	public function __construct() {
		parent::__construct();

		$this->isLogin();
		$this->clearCache();

		$this->load->model('Model_admin');
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
		$data['all']=$this->Model_admin->all();
		$data['content']='admin/home_admin/list';
		$this->load->view('admin/template/body', $data);
	}

	public function add()
	{
		$data['admin'] = array(
			'user_id' => '',
			'nama' => '',
			'email' => '',
			'password' => ''
		);
		$data['aktif'] = $this->aktif;
		$data['title'] = "Add Admin";
		$data['content']='admin/home_admin/form';
		$this->load->view('admin/template/body', $data);
	}

	public function edit($id){
		$admin = $this->Model_admin->find($id);
		$data['admin'] = array(
			'user_id' => $admin->user_id,
			'nama' => $admin->nama,
			'email' => $admin->email,
			'password' => $admin->password
		);
		$data['aktif'] = $this->aktif;
		$data['title'] = "Edit admin";
		$data['content'] = 'admin/home_admin/form';
		$this->load->view('admin/template/body', $data);
	}

	public function save() {
		$param = $this->input->post();
		if ($param['user_id'] == "") {
			$result = $this->Model_admin->add($param);
		} else {
			$result = $this->Model_admin->edit($param);
		}

		$msg = array('success' => 'Data saved successfully');
		$this->session->set_flashdata('msg', $msg['success']);

		redirect(base_url('admin'));
	}

	public function delete($id) {
		$this->Model_admin->delete($id);
		redirect(base_url('admin'));
	}

	
}
