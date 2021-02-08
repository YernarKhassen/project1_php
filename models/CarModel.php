<?php 

	namespace models;
	use models\Car;
	use core\DBManager;
	use PDO;

	class CarModel{
		
		private $dbmanager;	
		
		public function __construct($dbmanager){
			$this->dbmanager =	$dbmanager;
		}

		public function getAllCars(){
			
			$result = array();

			try {
				
				$query = $this->dbmanager->getConnection()->prepare("SELECT * FROM cars");
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_CLASS,"models\Car");

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;	

		}


		function addCar($car){

			try {
				
				$query = $this->dbmanager->getConnection()->prepare("
					INSERT INTO cars (name, model, price)
					VALUES (:name, :model, :price)
					");
				$query->execute(array("name"=>$car->name,"model"=>$car->model,"price"=>$car->price,));
				$result = $query->fetchAll(PDO::FETCH_CLASS,"models\Car");

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		public function getCar($id){
			
			$result = null;

			try {
				
				$query = $this->dbmanager->getConnection()->prepare("SELECT * FROM cars WHERE id = :id");
				$query->execute(array("id"=>$id));
				$query->setFetchMode(PDO::FETCH_CLASS,"models\Car");
				$result = $query->fetch();

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;	

		}

	}

 ?>