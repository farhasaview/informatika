<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_dosen extends CI_Controller {

  public function __construct() {
    parent::__construct();
    
     $this->clearCache();
  }
  private function clearCache() {
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
  }

  public function index() {
    if ($this->session->userdata('masuk') == 'pak eko') {
      redirect(base_url('dosen'));
      die();
    }
    $this->load->view("dosen/login");
  }

  public function check() {
    $this->load->model('Model_dosen');
    $nidn = $this->input->post('nidn');
    $pass = md5($this->input->post('password'));
    $dosen = $this->Model_dosen->check($nidn, $pass);
    if (!$dosen) {
      $msg = array('failed' => 'Login failed');
      $this->session->set_flashdata('msg', $msg['failed']);
      redirect(base_url('login_dosen'));
    } else {
      $this->session->set_userdata(array(
        'masuk' => 'pak eko',
        'id_dosen' => $dosen->id_dosen,
        'nidn' => $dosen->nidn,
        'nama' => $dosen->nama
      ));
      redirect(base_url('dosen'));
    }
  }

  // public function logout() {
  //   $this->session->sess_destroy();
  //   redirect(site_url());
  // }

  public function logout_d(){
        $this->session->unset_userdata('masuk') && $this->session->sess_destroy('id_dosen');
        redirect(site_url());
    }

}
