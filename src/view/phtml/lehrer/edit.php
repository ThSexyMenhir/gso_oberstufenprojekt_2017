<?php
if (!class_exists("TeacherController")) {
	include __DIR__ . "/../../../controller/TeacherController.php";
}

$siteTitle = "Lehrer Bearbeiten";

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

$teacherController = new TeacherController();
$teacher = $teacherController->getEntity($id);

if (is_null($class)) {
	//TODO redirect + Fehlermeldung
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
				<input type="hidden" name="id" value="<?= $teacher["id"] ?>">
				<div class="form-group col-md-4 col-xs-12">
					<label for="firstname">Vorname:</label>
					<input type="text" class="form-control" value="<?= $teacher["vorname"] ?>" name="firstName">
				</div>

				<div class="form-group col-md-4 col-xs-12">
					<label for="lastName">Nachname:</label>
					<input type="text" class="form-control" value="<?= $teacher["nachname"] ?>" name="lastName">
				</div>

				<div class="form-group col-md-4 col-xs-12">
					<label for="membercode">Kürzel</label>
					<input type="text" class="form-control" value="<?= $teacher["kuerzel"] ?>" name="memberCode">
				</div>

				<div class="form-group col-md-4 col-xs-12">
					<label for="userName">Benutzername</label>
					<input type="text" class="form-control" value="<?= $teacher["benutzername"] ?>" name="userName">
				</div>

				<div class="form-group col-md-4 col-xs-12">
					<label for="password">Password</label>
					<input type="password" class="form-control" value="<?= $teacher["passwort"] ?>" name="password">
				</div>

				<div class="form-check col-md-4 col-xs-12">
					<label class="form-check-label">
						<input type="checkbox"
							   class="form-check-input"
							   value="1"
							   name="isAdmin" <? if ($teacher["ist_admin"]) {echo "checked";} ?>
						>
						Ist Admin?
					</label>
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