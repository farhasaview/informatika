<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public $aktif='materi';

	public function __construct() {
		parent::__construct();

		$this->load->model('Model_materi');
		$this->load->helper('download');
	}

	public function index()
	{
		$data['aktif'] = $this->aktif;
		$data["materis"] = $this->Model_materi->getAll();
		$this->load->view("public/list_download", $data);
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
				redirect(base_url('materi'));
			}
		}
	}
}
