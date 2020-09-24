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
			include 'connect.php';
			$errors = [];
			$succ = [];

			if(isset($_POST['email'])) {
				$special = '/[!@#$%^&*(),.?` \'~;\\/\-+":{}|<>]/';
				$email = $_POST['email'];
				$name = $_POST['name'];
				$password = $_POST['password'];
				$checkPassword = $_POST['re_enter_password'];
				if(empty($name)) {
					$errors['Name_required'] = 'Name not empty';
				}
				if(empty($email)) {
					$errors['Email_required'] = 'Email not empty';
				}
				if(empty($password)) {
					$errors['Password_required'] = 'Password not empty';
				}
				if(strlen($password) < 6) {
					$errors['Password_size'] = 'Password min size is 6 character';
				}
				if($password != $checkPassword) {
					$errors['Password_match'] = 'Two Password not match';
				}
				if (preg_match($special, $password)){
				    $errors['Password_special_char'] = 'Password must 0-9 a-z A-Z';
				}
				if(!$errors) {
					$check = mysqli_query($con, "select * from users where email = '$email'");
					if (mysqli_num_rows($check)) {
						$errors['Email_exists'] = 'Email has been registered !';
					} else {
						$sql = "insert into users(name, email, password) values('$name', '$email', '$password')";
						$result = mysqli_query($con, $sql);
						if ($result) {
							$succ['success'] = "Register succesfuly!";
						}
					}
				}
			}
			mysqli_close($con);
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
				<?php if ($succ): ?>
					<?php foreach ($succ as $key => $s): ?>
						<div class="alert alert-success" role="alert">
							<li><strong><?php echo $key; ?>: </strong><?php echo $s; ?></li>
						</div>
					<?php endforeach ?>
				<?php endif ?>
				<form action="" method="POST" >
					<div class="form-group row">
						<label for="email" class="col-sm-2 form-control-label">Name</label>
						<div class="col-sm-10">
							<input type="name" class="form-control" name="name" placeholder="Name">
						</div>
					</div>
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
						<label for="password" class="col-sm-2 form-control-label">Confirm Pasword</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="re_enter_password" placeholder="Email">
						</div>
					</div>
					<div class="form-group row">
						<div>
							<button type="submit" class="btn btn-info">Register</button>
						</div>
					</div>
					<div class="form-group row">
						<div>
							<span class="mb-3 d-block text-muted">If you  have a Account click Login to Login</span><a href="login.php" class="btn btn-success">Login</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>