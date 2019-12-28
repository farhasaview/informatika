<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {
	private $_table = "tbl_berita";

	public $id_berita;
	public $sampul = "default.jpg";
	public $judul;
	public $konten;
	public $tgl;
	public $id_kategori;

	public function rules() {
		return [
			['field' => 'judul',
			'label' => 'Judul',
			'rules' => 'required'],

			['field' => 'tgl',
			'label' => 'tgl',
			'rules' => 'required'],

			['field' => 'id_kategori',
			'label' => 'id_kategori',
			'rules' => 'required'],

			['field' => 'konten',
			'label' => 'Konten',
			'rules' => 'required']
		];
	}

	public function getAll() {
		$sql = "SELECT a.*,b.* FROM $this->_table as a, tbl_kategori as b where a.id_kategori=b.id_kategori ORDER BY id_berita DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
		$query->free_result();
	}

	public function getById($id) {
		return $this->db->get_where($this->_table, ["id_berita" => $id])->row_array();
	}

	public function find($id) {
		return $this->db->get_where($this->_table, ["id_berita" => $id])->row();
	}

	public function save() {
		$post = $this->input->post();
		$this->id_berita = uniqid();
		$this->sampul = $this->_uploadFile();
		$this->judul = $post["judul"];
		$this->konten = $post["konten"];
		$this->tgl = $post["tgl"];
		$this->id_kategori = $post["id_kategori"];
		$this->db->insert($this->_table, $this);
	}

	public function update() {
		$post = $this->input->post();
		$this->id_berita = $post["id"];

		if (!empty($_FILES["sampul"]["judul"])) {
			$this->sampul = $this->_uploadFile();
		}else{
			$this->sampul = $post["old_sampul"];
		}

		$this->judul = $post["judul"];
		$this->konten = $post["konten"];
		$this->tgl = $post["tgl"];
		$this->id_kategori = $post["id_kategori"];
		$this->db->update($this->_table, $this, array('id_berita' => $post['id']));
	}

	public function delete($id) {
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("id_berita" => $id));
	}

	private function _uploadFile() {
		$config['upload_path'] = './uploads/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['file_name'] = $this->id_berita;
		$config['overwrite'] = true;
		$config['max_size'] = 10000; // 10 MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('sampul')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}

	private function _deleteImage($id) {
		$berita = $this->getById($id);
		if ($berita->sampul != "default.jpg") {
			$filename = explode(".", $berita->sampul)[0];
			return array_map('unlink', glob(FCPATH."uploads/image/$filename.*"));
		}
	}

}