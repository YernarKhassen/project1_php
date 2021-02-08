<?php 

	namespace controllers;
	use core\User as checkUser;
	use core\Controller;
	use core\dbmanager;
	use models\CarModel;
	use models\Car;
	use models\UserModel;
	use models\User;
	
	class MainController extends Controller{

		private $carModel;
		private $UserModel;
		private $dbmanager;
		private $checkUser;

		public function __construct(){
			$this->dbmanager = new DBManager();
			$this->carModel = new CarModel($this->dbmanager);
			$this->UserModel = new UserModel($this->dbmanager);
			$this->checkUser = new checkUser();
		}

		function index(){
			$cars = $this->carModel->getAllCars();
			$_REQUEST['CARS_LIST'] = $cars;
			$online = $this->checkUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->checkUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			return "index";
		}

		function details(){
			$online = $this->checkUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->checkUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			$id = $_GET['id'];	
			$car = $this->carModel->getCar($id);
			$_REQUEST['CAR_OBJECT'] =$car;
			return "detailspage";
		}

		function addcar(){
			$online = $this->checkUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->checkUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			return "addcarpage";
		}

		function toaddcar(){

			$car = new Car();
			$car->name = $_POST['name'];
			$car->model = $_POST['model'];
			$car->price = $_POST['price'];

			$this->carModel->addCar($car);

			header("Location:addcar?success");
		}

		function register(){
			$online = $this->checkUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->checkUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			return "registerpage";
		}

		function toregister(){

			$user = new User();
			$redirect = "register?passworderror";

			if($_POST['password']===$_POST['re_password']){

				$user = $this->UserModel->getUser($_POST['email']);

				if($user!=null || $user->id!=null){
					$redirect = "register?exists";
				}else{

					$user->email = $_POST['email'];
					$user->password = sha1($_POST['password']);
					$user->full_name = $_POST['full_name'];

					$this->UserModel->addUser($user);
					$redirect = "register?success";

				} 

				

			}


			

			header("Location:$redirect");
		}

		function login(){
			$online = $this->checkUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->checkUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			return "loginpage";	
		} 

		function home(){
			$online = $this->checkUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->checkUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			return "homepage";	
		}	

		function auth(){

			$redirect = "login?error";

			if(isset($_POST['email_l']) && isset($_POST['email_l'])){

				$email = $_POST['email_l'];
				$password = $_POST['password_l'];

				$user = $this->UserModel->getUser($email);
				if($user!=null && $user->password === sha1($password) ){
					
					$this->checkUser->setUserData($user);
					$redirect = 'profile';

				}
			}

			header("Location:$redirect");
		} 

		function profile(){

			$online = $this->checkUser->checkOnline();
			$_REQUEST['ONLINE'] = $online;

			if($online){

				$_REQUEST['USER'] =	$this->checkUser->getUserData();

				return "profilepage";

			}else{
				header("Location:login");
			}

		}

		function logout(){
			$this->checkUser->removeUserData();
			header("Location:login");
		}

	}


?>