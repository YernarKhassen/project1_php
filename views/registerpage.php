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
					  User added successfully!
					</div>
				<?php
					}else if(isset($_GET['exists'])){
						?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  User exists!
					</div>
					<?php
					}else if(isset($_GET['passworderror'])){
						?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Passwords are not equal!
						</div>
					<?php
					}
				?>
				<form action="toregister" method="post">
					<div class="form-group">
						<label>
							EMAIL :
						</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>
							PASSWORD :
						</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label>
							RETYPE PASSWORD :
						</label>
						<input type="password" name="re_password" class="form-control">
					</div>
					<div class="form-group">
						<label>
							FULL NAME :
						</label>
						<input type="text" name="full_name" class="form-control">
					</div>
					<div class="form-group mt-2">
						<button class="btn btn-success">ADD USER</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>