<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}

$siteTitle = "Stunden Bearbeiten";

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
	exit;
}

$subjectController = new SubjectController();
$subject = $subjectController->getEntity($id);
if (is_null($subject)) {
	header("Location: index.php");
	exit;
}

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
	<div class="container">
		<form action="do-edit.php" method="POST">
			<div class="row">
				<input type="hidden" name="id" value="<?= $subject["id"] ?>">
				<div class="form-group col-md-4 col-xs-12">
					<label for="membercode">Kürzel:</label>
					<input type="text" class="form-control" value="<?= $subject["kuerzel"] ?>" name="shortTag">
				</div>

				<div class="form-group col-md-4 col-xs-12">
					<label for="description">Bezeichnung:</label>
					<input type="text" class="form-control" value="<?= $subject["bezeichnung"] ?>" name="description">
				</div>

				<button type="submit" class="btn btn-default pull-left btn-success">Speichern</button>
				<a href="index.php" class="btn btn-default pull-right btn-danger">Zurück</a>
			</div>
		</form>
	</div>
</main>
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<script src="../../../../vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../../../../src/view/js/main.js"></script>
</body>
</html>