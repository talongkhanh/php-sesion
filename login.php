<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Login</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>

	<body>
		<?php 
			include 'header.php';
			$errors = [];
			if(isset($_POST['email'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];
				if(empty($email)) {
					$errors['Email_required'] = 'Email not empty';
				}
				if(empty($password)) {
					$errors['Password_required'] = 'Password not empty';
				}
				if (!$errors) {
					
					include 'connect.php';
					$sql = "select * from users where email = '$email' and password = '$password'";
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result)) {
						$user = mysqli_fetch_assoc($result);
						$_SESSION['profile'] = $user;
						header('location: index.php');
					} else {
						$errors['Login_Failed'] = 'Email or Password not correct !';
					}
					mysqli_close($con);
				}
			}

			
			

		?>

		<div class="container">
			<div class="col-md-6 mx-auto mt-5 border border-info p-5">
				<?php if ($errors): ?>
					<?php foreach ($errors as $key => $er): ?>
						<div class="alert alert-danger" role="alert">
							<li><strong><?php echo $key; ?>: </strong><?php echo $er; ?></li>
						</div>
					<?php endforeach ?>
				<?php endif ?>
				<form action="" method="POST" >
					<div class="form-group row">
						<label for="email" class="col-sm-2 form-control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" placeholder="Email">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-2 form-control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" placeholder="Email">
						</div>
					</div>
					<div class="form-group row">
						<div>
							<button type="submit" class="btn btn-success">Login</button>
						</div>
					</div>
					<div class="form-group row">
						<div>
							<span class="mb-3 d-block text-muted">If you don't have a Account click Register to create Account</span><a href="register.php" class="btn btn-info">Register</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>