<?php 
	
	class Database{
		private $host = DB_HOST,
				$user = DB_USER,
				$pass = DB_PASS,
				$db_name = DB_NAME;

		private $db, $stmt;

		public function __construct(){
			// database source name
			$dsn = "mysql:host={$this->host};dbname={$this->db_name}";
			
			$option = [
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			];

			try {
				$this->db = new PDO($dsn, $this->user, $this->pass, $option);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		// Melakukan query
		public function query($query){
			$this->stmt = $this->db->prepare($query);
		}

		// Untuk pengisian data where clause dan untuk eksekusi query yang aman
		public function bind($param, $value, $type = null){
			if (is_null($type)) {
				if (is_int($value)) {
					$type = PDO::PARAM_INT;
				}elseif (is_bool($value)) {
					$type = PDO::PARAM_BOOL;
				}elseif (is_null($value)) {
					$type = PDO::PARAM_NULL;
				}else{
					$type = PDO::PARAM_STR;
				}
			}
			$this->stmt->bindValue($param, $value, $type);
		}

		// eksekusi query
		public function execute(){
			$this->stmt->execute();
		}

		// menambil data sekaligus banyak
		public function resultSet(){
			$this->stmt->execute();
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);	
		}

		// menambil data persatuan
		public function single(){
			$this->stmt->execute();
			return $this->stmt->fetch(PDO::FETCH_ASSOC);	
		}

	}