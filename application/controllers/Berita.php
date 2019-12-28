<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berita extends CI_Controller {

	public $aktif='berita';

	public function __construct() {
		parent::__construct();

		$this->isLogin();
		$this->clearCache();

		$this->load->model('Model_kategori');
		$this->load->model('M_berita');
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
		$data["beritas"] = $this->M_berita->getAll();
		$this->load->view("admin/berita/list", $data);
	}

	public function add()
	{
		$data['kategoris']=$this->Model_kategori->all();
		$data['berita'] = [
			'id_berita' => '',
			'sampul' => '',
			'judul' => '',
			'konten' => '',
			'tgl' => '',
			'id_kategori' => ''
		];
		$berita = $this->M_berita;
		$this->form_validation->set_rules($berita->rules());

		if ($this->form_validation->run()) {
			$berita->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data['aktif'] = $this->aktif;
		$this->load->view("admin/berita/add", $data);
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('berita');

		$data['kategoris']=$this->Model_kategori->all();
		
		$berita = $this->M_berita;
		$this->form_validation->set_rules($berita->rules());

		if ($this->form_validation->run()) {
			$berita->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data['aktif'] = $this->aktif;
		$data["berita"] = $berita->find($id);
		if (!$data["berita"]) show_404();

		$this->load->view("admin/berita/edit", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->M_berita->delete($id)) {
			redirect(base_url('berita'));
		}
	}

	public function view()
	{
		$id=$this->uri->segment(3);
		$x['kategori']=$this->M_berita->getAll();
		$x['berita']=$this->M_berita->getById($id);
		// print_r($x);
		// var_dump($x);
		$this->load->view('admin/berita/v_post_view',$x);
	}

}
