<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_materi extends CI_Model {
	private $_table = "tbl_materi";

	public $id_materi;
	public $nama_materi;
	public $id_dosen;
	public $semester;
	public $file = "default.txt";

	public function rules() {
		return [
			['field' => 'nama_materi',
			'label' => 'Nama Materi',
			'rules' => 'required'],

			['field' => 'id_dosen',
			'label' => 'id_dosen',
			'rules' => 'required'],

			['field' => 'semester',
			'label' => 'Semester',
			'rules' => 'numeric']
		];
	}

	public function getAll() {
		$sql = "SELECT a.*,b.* FROM tbl_materi as a, tbl_dosen as b where a.id_dosen=b.id_dosen";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
		$query->free_result();
	}

	public function getById($id) {
		return $this->db->get_where($this->_table, ["id_materi" => $id])->row();
	}

	public function save() {
		$post = $this->input->post();
		$this->id_materi = uniqid();
		$this->nama_materi = $post["nama_materi"];
		$this->id_dosen = $post["id_dosen"];
		$this->semester = $post["semester"];
		$this->file = $this->_uploadFile();
		$this->db->insert($this->_table, $this);
	}

	public function update() {
		$post = $this->input->post();
		$this->id_materi = $post["id"];
		$this->nama_materi = $post["nama_materi"];
		$this->id_dosen = $post["id_dosen"];
		$this->semester = $post["semester"];

		if (!empty($_FILES["file"]["nama_materi"])) {
			$this->file = $this->_uploadFile();
		}else{
			$this->file = $post["old_file"];
		}

		$this->db->update($this->_table, $this, array('id_materi' => $post['id']));
	}

	public function delete($id) {
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("id_materi" => $id));
	}

	private function _uploadFile() {
		$config['upload_path'] = './uploads/materi/';
		$config['allowed_types'] = 'txt|csv|xls|xlsx|doc|docx|odt|pdf|ppt|pptx';
		$config['file_name'] = $this->nama_materi.'_semester_'.$this->semester.'_'.SITE_NAME;
		$config['overwrite'] = true;
		$config['max_size'] = 10000; // 10 MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}

		return "default.txt";
	}

	private function _deleteImage($id) {
		$materi = $this->getById($id);
		if ($materi->file != "default.txt") {
			$filename = explode(".", $materi->file)[0];
			return array_map('unlink', glob(FCPATH."uploads/materi/$filename.*"));
		}
	}
}

/* End of file Model_product.php */
/* Location: ./application/models/Model_product.php */