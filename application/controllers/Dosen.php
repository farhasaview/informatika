<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public $aktif='dosen';

	public function __construct() {
		parent::__construct();

		$this->isLogin();
		$this->clearCache();

		$this->load->model('Model_dosen');
		$this->load->model('Model_materi');
		$this->load->helper('download');
	}
	private function isLogin() {
		$isLogin = $this->session->userdata('masuk');
		if ($isLogin != 'pak eko') {
			$msg = array('failed' => 'Silahkan Login');
			$this->session->set_flashdata('msg', $msg['failed']);
			redirect(base_url('login_dosen'));
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
		$data["dosens"] = $this->Model_dosen->getAll();
		$this->load->view("dosen/list_dosen", $data);
	}

	public function materi()
	{
		$data['aktif'] = $this->aktif;
		$data["materis"] = $this->Model_materi->getAll();
		$this->load->view("dosen/list_materi", $data);
	}

	public function add()
	{
		$data['dosens']=$this->Model_dosen->getAll();
		$data['materi'] = [
			'id_materi' => '',
			'nama_materi' => '',
			'semester' => '',
			'file' => '',
			'id_dosen' => ''
		];
		$materi = $this->Model_materi;
		$this->form_validation->set_rules($materi->rules());

		if ($this->form_validation->run()) {
			$materi->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data['aktif'] = $this->aktif;
		$this->load->view("dosen/add_materi", $data);
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('dosen/materi');

		$data['dosens']=$this->Model_dosen->getAll();
		
		$materi = $this->Model_materi;
		$this->form_validation->set_rules($materi->rules());

		if ($this->form_validation->run()) {
			$materi->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data['aktif'] = $this->aktif;
		$data["materi"] = $materi->getById($id);
		if (!$data["materi"]) show_404();

		$this->load->view("dosen/edit_materi", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->Model_materi->delete($id)) {
			redirect(base_url('dosen/materi'));
		}
	}

	public function edit_dosen($id)
	{
		if (!isset($id)) redirect('dosen');

		$dosen = $this->Model_dosen;
		$this->form_validation->set_rules($dosen->rules());

		if ($this->form_validation->run()) {
			$dosen->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data['aktif'] = $this->aktif;
		$data["dosen"] = $dosen->getById($id);
		if (!$data["dosen"]) show_404();

		$this->load->view("dosen/edit_dosen", $data);
	}

	public function download($fileName = NULL) {   
		if ($fileName) {
			$file = realpath("uploads/materi")."\\".$fileName;
    		// check file exists    
			if (file_exists($file)) {
     			// get file content
				$data = file_get_contents($file);
     			//force download
				force_download($fileName, $data);
			} else {
     			// Redirect to base url
				redirect(base_url('dosen/materi'));
			}
		}
	}

	public function logout_dosen() {
		$this->session->sess_destroy();
		redirect(site_url());
	}
}
