<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Home</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	</head>

	<body>
		<?php include 'header.php'; ?>

		<div class="container">
			<?php if (!empty($_SESSION['profile'])): ?>
				<?php $profile = $_SESSION['profile'] ?>
				<div class="mt-5">
					<h1>Welcome <?php echo $profile['name']; ?></h1>
				</div>
			<?php else: ?>
				<?php header('location: login.php'); ?>
			<?php endif ?>
		</div>
	</body>
</html>