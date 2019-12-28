<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    
     $this->clearCache();
  }
  private function clearCache() {
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
  }

  public function index() {
    if ($this->session->userdata('logged_in') == 'admin') {
      redirect(base_url('admin'));
      die();
    }
    $this->load->view("admin/login");
  }

  public function check() {
    $this->load->model('Model_admin');
    $email = $this->input->post('email');
    $pass = md5($this->input->post('password'));
    $user = $this->Model_admin->check($email, $pass);
    if (!$user) {
      $msg = array('failed' => 'Login failed');
      $this->session->set_flashdata('msg', $msg['failed']);
      redirect(base_url('login'));
    } else {
      $this->session->set_userdata(array(
        'logged_in' => 'admin',
        'user_id' => $user->user_id,
        'email' => $user->email,
        'nama' => $user->nama
      ));
      redirect(base_url('admin'));
    }
  }

  // public function logout() {
  //   $this->session->sess_destroy();
  //   redirect(site_url());
  // }

  public function logout_a(){
        $this->session->unset_userdata('logged_in') && $this->session->sess_destroy('user_id');
        redirect(site_url());
    }

}
