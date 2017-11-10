<?php
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}
if (!class_exists("StudentController")) {
	include __DIR__ . "/../../../controller/StudentsController.php";
}

$siteTitle = "Schüler Bearbeiten";

$classController = new ClassController();
$classes = $classController->getEntities([], ['bezeichnung']);

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
	exit;
}

$studentController = new StudentsController();
$student = $studentController->getEntity($id);

if (is_null($student)) {
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
		<form action="do-edit.php" method="POST" enctype="multipart/form-data">
			<div class="row">
				<input type="hidden" name="id" value="<?= $student["id"] ?>">
				<div class="form-group col-md-3 col-xs-12">
					<label for="firstName">Vorname:</label>
					<input type="text" class="form-control" value="<?= $student["vorname"] ?>" name="firstName">
				</div>
				<div class="form-group col-md-3 col-xs-12">
					<label for="lastName">Nachname:</label>
					<input type="text" class="form-control" value="<?= $student["nachname"] ?>" name="lastName">
				</div>
				<div class="form-group col-md-2 col-xs-12">
					<label for="idClass">Klasse:</label>
					<select class="form-control" name="idClass">
						<?php foreach ($classes as $class) { ?>
							<option value="<?= $class["id"] ?>"
								<? if ($student["id_klasse"] === $class["id"]) {
									echo "selected";
								} ?>
							>
								<?= $class["bezeichnung"] ?>
							</option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="photo">Datei einfügen</label>
					<input type="file" class="form-control-file" name="photo" accept="image/*">
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