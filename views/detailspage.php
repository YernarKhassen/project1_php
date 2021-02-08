<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
		require_once 'head.php';
	?>
</head>
<body>
	<?php 
		require_once 'nav.php';
	 ?>
	<div class="container">
		<div class="row mt-4">
			<div class="col-sm-12">
				<?php 
					$car = $_REQUEST['CAR_OBJECT'];
					if($car!=null && $car->id!=null){

				?>
				<div class="jumbotron">
				  <h1 class="display-4">
				  	<?php 
				  		echo $car->name;
				  	?>
				  </h1>
				  <hr class="my-4">
				  <p>
				  	<?php 
				  		echo $car->model." for ".$car->price;
				  	?>
				  </p>
				<?php 
					}else{	
				?>
					<h1 class="text-center">404 CAR NOT FOUND!</h1>
				<?php  
					}
				?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>