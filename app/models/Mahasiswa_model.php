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
			$this->db->query("SELECT a.*, b.jurusan FROM {$this->table} a INNER JOIN ref_jurusan b ON a.id_jurusan = b.id WHERE a.id = :id");
			$this->db->bind('id', $id);
			// menampilkan seluruh data
			return $this->db->single();
		}

		// $data adalah array $_POST
		// tambah data mahasiswa
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

		// hapus data mahasiswa
		public function hapusDataMahasiswa($id){
			$query= "DELETE FROM {$this->table} WHERE id = :id";
			$this->db->query($query);
			$this->db->bind('id', $id);
			$this->db->execute();

			// mengembalikan jumlah baris yang berubah
			return $this->db->rowCount();
		}

		// ubah data mahasiswa
		public function ubahDataMahasiswa($data){
			$query = "UPDATE {$this->table} SET nama = :nama,
				nim = :nim,
				id_jurusan = :id_jurusan,
				email = :email
			WHERE id = :id
			";

			$this->db->query($query);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('nim', $data['nim']);
			$this->db->bind('id_jurusan', $data['id_jurusan']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('id', $data['id_mhs']);
			$this->db->execute();

			// mengembalikan jumlah baris yang berubah
			return $this->db->rowCount();
		}

		// cari data mahasiswa berdasarkan nama
		public function getMahasiswaByName($name){
			$this->db->query("SELECT a.*, b.jurusan FROM {$this->table} a INNER JOIN ref_jurusan b ON a.id_jurusan = b.id WHERE a.nama LIKE :nama");
			$this->db->bind('nama', "%{$name}%");
			// menampilkan seluruh data
			return $this->db->resultSet();
		}
	}