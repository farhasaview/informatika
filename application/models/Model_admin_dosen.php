<?php

class Model_admin_dosen extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function all() {
    $sql = "SELECT * FROM tbl_dosen";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
    $query->free_result();
  }

  public function find($id) {
    $sql = "SELECT * FROM tbl_dosen WHERE id_dosen=?";
    $query = $this->db->query($sql, array($id));
    if ($query->num_rows() > 0) {
      $result = $query->result();
      return $result[0];
    } else {
      return null;
    }
    $query->free_result();
  }

  public function add($param) {
    $sql = "INSERT INTO tbl_dosen (nama, nidn, password) VALUES (?, ?, ?)";
    $this->db->query($sql, array($param['nama'], $param['nidn'], md5($param['password']) ));
    return true;
  }

  public function edit($param) {
    if(trim($param['password']) == ""){
      $sql = "UPDATE tbl_dosen SET nama=?, nidn=? WHERE id_dosen=?";
      $this->db->query($sql, array($param['nama'], $param['nidn'], $param['id_dosen']));
    }else{
      $sql = "UPDATE tbl_dosen SET nama=?, nidn=?, password=? WHERE id_dosen=?";
      $this->db->query($sql, array($param['nama'], $param['nidn'], md5($param['password']), $param['id_dosen']));
    }
    return true;
  }

  public function delete($id) {
    $sql = "DELETE FROM tbl_dosen WHERE id_dosen = ?";
    $this->db->query($sql, array($id));
    return true;
  }  

}