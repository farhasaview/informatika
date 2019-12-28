<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

class Model_admin extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function check($email, $pass) {
    $sql = "SELECT * FROM tbl_admin WHERE email=? AND password=?";
    $query = $this->db->query($sql, array($email, $pass));
    if ($query->num_rows() > 0) {
      $result = $query->result();
      return $result[0];
    } else {
      return null;
    }
    $query->free_result();
  }

  public function all() {
    $sql = "SELECT * FROM tbl_admin";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
    $query->free_result();
  }

  public function find($id) {
    $sql = "SELECT * FROM tbl_admin WHERE user_id=?";
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
    $sql = "INSERT INTO tbl_admin (nama, email, password) VALUES (?, ?, ?)";
    $this->db->query($sql, array( $param['nama'], $param['email'], md5($param['password'])));
    return true;
  }

  public function edit($param) {
    if(trim($param['password']) == ""){
      $sql = "UPDATE tbl_admin SET nama=?, email=? WHERE user_id=?";
      $this->db->query($sql, array($param['nama'], $param['email'], $param['user_id']));
    }else{
      $sql = "UPDATE tbl_admin SET nama=?, email=?, password=? WHERE user_id=?";
      $this->db->query($sql, array($param['nama'], $param['email'], md5($param['password']), $param['user_id']));
    }
    return true;
  }
  public function delete($id) {
    $sql = "DELETE FROM tbl_admin WHERE user_id = ?";
    $this->db->query($sql, array($id));
    return true;
  }

}

