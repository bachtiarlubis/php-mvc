<?php 
	
	class Jurusan_model{
		private $table = 'ref_jurusan',
				$db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getAllJurusan(){
			$this->db->query("SELECT * FROM {$this->table}");
			// menampilkan seluruh data
			return $this->db->resultSet();
		}

		public function getJurusanById($id){
			$this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
			$this->db->bind('id', $id);
			// menampilkan seluruh data
			return $this->db->single();
		}

	}