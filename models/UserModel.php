<?php 

	namespace models;
	use models\User;
	use core\DBManager;
	use PDO;

	class UserModel{
		
		private $dbmanager;	
		
		public function __construct($dbmanager){
			$this->dbmanager =	$dbmanager;
		}

		function addUser($user){

			try {
				
				$query = $this->dbmanager->getConnection()->prepare("
					INSERT INTO users (email, password, full_name)
					VALUES (:email, :password, :full_name)
					");
				$query->execute(array("email"=>$user->email,"password"=>$user->password,"full_name"=>$user->full_name,));
				$result = $query->fetchAll(PDO::FETCH_CLASS,"models\User");

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		public function getUser($email){
			
			$result = null;

			try {
				
				$query = $this->dbmanager->getConnection()->prepare("SELECT * FROM users WHERE email = :email");
				$query->execute(array("email"=>$email));
				$query->setFetchMode(PDO::FETCH_CLASS,"models\User");
				$result = $query->fetch();

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;	

		}

	}

 ?>