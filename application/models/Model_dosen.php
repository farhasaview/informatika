<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

class Model_dosen extends CI_Model {
  private $_table = "tbl_dosen";

  public $id_dosen;
  public $nama;
  public $nidn;
  public $password;

  public function check($nidn, $pass) {
    $sql = "SELECT * FROM $this->_table WHERE nidn=? AND password=?";
    $query = $this->db->query($sql, array($nidn, $pass));
    if ($query->num_rows() > 0) {
      $result = $query->result();
      return $result[0];
    } else {
      return null;
    }
    $query->free_result();
  }

  public function rules() {
    return [
      ['field' => 'nama',
      'label' => 'Nama',
      'rules' => 'required'],

      ['field' => 'nidn',
      'label' => 'NIDN',
      'rules' => 'numeric'],

      ['field' => 'password',
      'label' => 'Password',
      'rules' => 'required']
    ];
  }

  public function getAll() {
    return $this->db->get($this->_table)->result();
  }

  public function getById($id) {
    return $this->db->get_where($this->_table, ["id_dosen" => $id])->row();
  }

  public function update() {
    $post = $this->input->post();
    $this->id_dosen = $post["id"];
    $this->nama = $post["nama"];
    $this->nidn = $post["nidn"];
    $this->password = $post["password"];
    $this->db->update($this->_table, $this, array('id_dosen' => $post['id']));
  }
}

