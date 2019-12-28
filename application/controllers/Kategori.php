<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public $aktif='kategori';

	public function __construct() {
		parent::__construct();

		$this->isLogin();
		$this->clearCache();

		$this->load->model('Model_kategori');
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
		$data['all']=$this->Model_kategori->all();
		$data['content']='admin/kategori/list';
		$this->load->view('admin/template/body', $data);
	}

	public function add()
	{
		$data['kategori'] = array(
			'id_kategori' => '',
			'nama_kategori' => ''
		);
		$data['aktif'] = $this->aktif;
		$data['title'] = "Add Kategori";
		$data['content']='admin/kategori/form';
		$this->load->view('admin/template/body', $data);
	}

	public function edit($id){
		$kategori = $this->Model_kategori->find($id);
		$data['kategori'] = array(
			'id_kategori' => $kategori->id_kategori,
			'nama_kategori' => $kategori->nama_kategori
		);
		$data['aktif'] = $this->aktif;
		$data['title'] = "Edit Kategori";
		$data['content'] = 'admin/kategori/form';
		$this->load->view('admin/template/body', $data);
	}

	public function save() {
		$param = $this->input->post();
		if ($param['id_kategori'] == "") {
			$result = $this->Model_kategori->add($param);
		} else {
			$result = $this->Model_kategori->edit($param);
		}

		$msg = array('success' => 'Data saved successfully');
		$this->session->set_flashdata('msg', $msg['success']);

		redirect(base_url('kategori'));
	}

	public function delete($id) {
		$this->Model_kategori->delete($id);
		redirect(base_url('kategori'));
	}

}