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
				<table class="table table-striped"> 
					<thead>
						<tr>
							<td>ID</td>
							<td>NAME</td>
							<td>MODEL</td>
							<td>PRICE</td>
							<td width="10%">DETAILS</td>
						</tr> 
					</thead>
					<tbody>
						<?php 
							$cars = $_REQUEST['CARS_LIST'];
							if($cars != null){
								foreach ($cars as $car) {
						?>
							<tr>
								<td>
									<?php echo $car->id; ?>
								</td>
								<td>
									<?php echo $car->name; ?>
								</td>
								<td>
									<?php echo $car->model; ?>
								</td>
								<td>
									<?php echo $car->price; ?>
								</td>
								<td>
									<a href="details?id=<?php  echo $car->id; ?>" class="btn btn-primary btn-sm">DETAILS</a> 
								</td>
							</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>