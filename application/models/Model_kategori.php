<?php

class Model_kategori extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  public function all()
  {
    $sql = "SELECT * FROM tbl_kategori";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
    $query->free_result();
  }

  public function find($id)
  {
    $sql = "SELECT * FROM tbl_kategori WHERE id_kategori=?";
    $query = $this->db->query($sql, array($id));
    if ($query->num_rows() > 0) {
      $result = $query->result();
      return $result[0];
    } else {
      return null;
    }
    $query->free_result();
  }

  public function add($param)
  {
    $sql = "INSERT INTO tbl_kategori ( nama_kategori ) VALUES ( ? )";
    $this->db->query($sql, array($param['nama_kategori'] ));
    return true;
  }

  public function edit($param)
  { 
    $sql = "UPDATE tbl_kategori SET nama_kategori=? WHERE id_kategori=?";
    $this->db->query($sql, array($param['nama_kategori'], $param['id_kategori']));
    return true;
  }

  public function delete($id)
  {
    $sql = "DELETE FROM tbl_kategori WHERE id_kategori = ?";
    $this->db->query($sql, array($id));
    return true;
  }  

}