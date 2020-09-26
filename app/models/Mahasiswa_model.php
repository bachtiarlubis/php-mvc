<?php 

	class Mahasiswa_model{
		private $table = 'tbl_mahasiswa',
				$db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getAllMahasiswa(){
			$this->db->query("SELECT a.*, b.jurusan FROM {$this->table} a INNER JOIN ref_jurusan b ON a.id_jurusan = b.id");
			// menampilkan seluruh data
			return $this->db->resultSet();
		}

		public function getMahasiswaById($id){
			$this->db->query("SELECT a.*, b.jurusan FROM {$this->table} a INNER JOIN ref_jurusan b ON a.id_jurusan = b.id WHERE b.id = :id");
			$this->db->bind('id', $id);
			// menampilkan seluruh data
			return $this->db->single();
		}

		// $data adalah array $_POST
		public function tambahDataMahasiswa($data){
			$query = "
					INSERT INTO {$this->table} VALUES
					('', :nama, :nim, :email, :id_jurusan)
					";
			$this->db->query($query);
			
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('nim', $data['nim']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('id_jurusan', $data['id_jurusan']);

			$this->db->execute();

			// mengembalikan jumlah baris yang berubah
			return $this->db->rowCount();


		}


		public function hapusDataMahasiswa($id){
			$query= "DELETE FROM {$this->table} WHERE id = :id";
			$this->db->query($query);
			$this->db->bind('id', $id);
			$this->db->execute();

			// mengembalikan jumlah baris yang berubah
			return $this->db->rowCount();
		}


	}