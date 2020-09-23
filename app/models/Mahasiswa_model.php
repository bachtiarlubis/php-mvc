<?php 
	class Database_model{
		protected 	$db, 
					$stmt;

		public function __construct(){
			// database source name
			$dsn = 'mysql:host=localhost;dbname=phpmvc';
			
			try {
				$this->db = new PDO($dsn, 'root', '');
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}
	}

	class Mahasiswa_model extends Database_model{

		public function getAllMahasiswa(){
			$this->stmt = $this->db->prepare('SELECT * FROM tbl_mahasiswa');
			$this->stmt->execute();

			// mengembalikan semua data mahasiswa
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}


	}