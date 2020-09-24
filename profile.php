<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Profile</title>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>

	<body>
		<?php 
			include 'header.php'; 
			$profile = $_SESSION['profile'];
		?>

		<div class="container">
			<?php if (isset($profile)): ?>
				<div class="col-md-6 mt-5 p-5 border border-info mx-auto">
					<h1 class="mt5">
						Information
					</h1>
					<table class="table table-inverse">
						<thead>
							<tr>
								<?php foreach ($profile as $key => $value): ?>
									<th><?php echo $key; ?></th> 
								<?php endforeach ?>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php foreach ($profile as $key => $value): ?>
									<th><?php echo $value; ?></th> 
								<?php endforeach ?>
							</tr>
						</tbody>
					</table>
				</div>
			<?php else: ?>
				<?php header('location: login.php'); ?>	
			<?php endif ?>
		</div>

	</body>
</html>