<?php 

	namespace core;
	use PDO;

	class DBManager{

		private $connection;

		public function __construct(){
			try {
				$this->connection = new PDO("mysql:host=localhost;dbname=newbd","root","");
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}	

		public function getConnection(){
			return $this->connection;
		}

	}

?>