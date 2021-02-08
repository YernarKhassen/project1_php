<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
		require_once 'head.php';
	?>
</head>
<body >
	<?php 
		require_once 'nav.php';
	 ?>
	<div class="container">
		<div class="row mt-4">
			<div class="col-sm-4 mx-auto offset-2 mt-5">
				<?php 
					if(isset($_GET['error'])){
				?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 	Incorrect login or password!
					</div>
				<?php
					}
				?>
				<form action="auth" method="post">
					<div class="form-group">
						<label>	
							EMAIL :
						</label>
						<input type="email" name="email_l" class="form-control">
					</div>
					<div class="form-group">
						<label>
							PASSWORD :
						</label>
						<input type="password" name="password_l" class="form-control">
					</div>
					<div class="form-group mt-2">
						<button class="btn btn-success">SIGN IN</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>