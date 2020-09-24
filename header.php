<?php 
session_start();
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="index.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav ml-auto">
				<?php if (isset($_SESSION['profile'])): ?>
					<?php $profile = $_SESSION['profile'] ?>
					<li class="nav-item">
						<a class="nav-link" href="profile.php"><?php echo $profile['name'] ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="unset.php">Logout</a>
					</li>
				<?php else: ?>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
				<?php endif ?>
			</ul>
		</div>
	</div>
</nav>
