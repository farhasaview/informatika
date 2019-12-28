<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_public extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('M_berita');
	}

	public function index(){
		$f['data']=$this->M_berita->getAll();
		if(!empty($f['data'])){
			$this->load->view('public/list_berita',$f);
		}else{
			echo "<br><center><h1> Beritanya belum ada gan :( <h1><center><br>";
			echo "<a href=".base_url('berita').">"."Add berita"."</a>";
		}
	}

	public function view(){
		$id=$this->uri->segment(3);
		$x['data']=$this->M_berita->getById($id);
		// print_r($x);
		// var_dump($x);
		$this->load->view('public/berita_detail',$x);
	}
}