<?php
	class Database {
	    // private     $mssqldriver = '{SQL Server Native Client 11.0}';
		private     $host       ="127.0.0.1";
		private     $port       ="5432";
        private     $database   ="cat_db";
        private     $user       ="postgres";
        private     $pass       ="12345";
        protected   $db;       
		protected 	$stmt; 

        public function __construct(){
			try {
				$this->db = new PDO("pgsql:host=".$this->host.";port=".$this->port.";dbname=".$this->database, $this->user, $this->pass);
				// $this->db = new PDO("sqlsrv:Server=".$this->host.";Database=".$this->database, $this->user, $this->pass);
				// $this->db = new PDO("mssql:host=". $this->host .";Database=". $this->database, $this->user, $this->pass);
				// $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

				return $this->db;
			} catch (Exception $e) {
				echo $e;
			}
        }

		public function prepare($query) {
			$this->stmt = $this->db->prepare($query);
		}

		public function bindParam($param, $value, $type = null){
			if (is_null($type)) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}

			$this->stmt->bindParam($param, $value, $type);
		}

		// public function execute() {
		// 	return $this->stmt->execute();
		// }

		public function execute($params = null) {
			if ($params) {
				return $this->stmt->execute($params);
			}
			return $this->stmt->execute();
		}

		public function fetchAll() {
			$data = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		public function fetch() {
			$data = $this->stmt->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function rowCount() {
			return $this->stmt->rowCount();
		}

		public function fetchColumn() {
			return $this->stmt->fetchColumn();
		}

		public function beginTransaction() {
			return $this->db->beginTransaction();
		}
	
		public function commit() {
			return $this->db->commit();
		}
	
		public function rollBack() {
			return $this->db->rollBack();
		}
	}
