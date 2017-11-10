<?php
$siteTitle = "Login";
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../../src/view/css/main.css">
	<link rel="stylesheet" href="../../../../vendor/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../../vendor/bootstrap-3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../../../../vendor/font-awesome.min.css">
	<title>GSO - Kalender</title>
</head>

<body>
<?php include __DIR__ . "/../../../../header.php" ?>
<main>
	<div class="container login">
		<div class="row">

			<div class="main">

				<h3>Login</h3>

				<form role="form" action="do-login.php" method="POST">
					<div class="form-group">
						<label for="username">Benutzernamen</label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label for="password">Passwort</label>
						<input type="password" class="form-control" name="password">
					</div>
					<button type="submit" class="btn btn btn-primary">
						Log In
					</button>
				</form>

			</div>

		</div>
	</div>
</main>
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<script src="../../../../vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../../../../src/view/js/main.js"></script>
</body>
</html>

