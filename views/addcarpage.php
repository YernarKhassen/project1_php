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
			<div class="col-sm-6 mx-auto">
				<?php 
					if(isset($_GET['success'])){
				?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Car added successfully!
					</div>
				<?php
					}
				?>
				<form action="toaddcar" method="post">
					<div class="form-group">
						<label>
							NAME :
						</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>
							MODEL :
						</label>
						<input type="text" name="model" class="form-control">
					</div>
					<div class="form-group">
						<label>
							PRICE :
						</label>
						<input type="number" name="price" class="form-control">
					</div>
					<div class="form-group mt-2">
						<button class="btn btn-success">ADD CAR</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>