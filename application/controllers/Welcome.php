<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_berita');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		$f['data']=$this->M_berita->getAll();
		$this->load->view('public/template/body',$f);
	}

	// public function tampil_public(){
	// 	$f['data']=$this->M_berita->get_all_berita();
	// 	if(!empty($f['data'])){
	// 		$this->load->view('public/list_berita',$f);
	// 	}else{
	// 		echo "<br><center><h1> Beritanya belum ada gan :( <h1><center><br>";
	// 		echo "<a href=".base_url('berita').">"."Add berita"."</a>";
	// 	}
	// }

	// public function berita_detail(){
	// 	$this->load->view('public/berita_detail');
	// }
}
