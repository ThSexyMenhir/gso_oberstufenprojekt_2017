<?php
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}
if (!class_exists("StudentsController")) {
	include __DIR__ . "/../../../controller/StudentsController.php";
}

$siteTitle = "Klassen Details";

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
	exit;
}

$classController = new ClassController();
$class = $classController->getEntity($id);

if (is_null($class)) {
	header("Location: index.php");
	exit;
}

$studentController = new StudentsController();
$students = $studentController->getEntitiesForOverview(["id_klasse" => ["=", $class["id"]]], ["nachname", "vorname"]);

?>
<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../../src/view/css/main.css">
	<link rel="stylesheet" href="../../../../src/view/css/klassen/detail.css">
	<link rel="stylesheet" href="../../../../vendor/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../../vendor/bootstrap-3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../../../../vendor/font-awesome.min.css">
	<title>GSO - Kalender</title>
</head>

<body>
<?php include __DIR__ . "/../../../../header.php" ?>
<main>
	<div class="container class-detail">
		<div class="row search">
			<div class="score-sheet">
				<div class="chart">
					<i class="fa fa-line-chart" aria-hidden="true"></i>
				</div>
				<div class="chart-button">
					Bewertungsbogen<br>
					<a href="../bewertungsbogen/index.php?idClass=<?= $class["id"] ?>"
					   class="btn btn-primary add-button">
						Einsehen
					</a>
					<a href="../bewertungsbogen/add.php?idClass<?= $class["id"] ?>" class="btn btn-primary add-button">
						Hinzufügen
					</a>
				</div>
			</div>
			<a href="../schueler/add.php?idClass=<?= $class["id"] ?>&from=<?= urlencode("klassen/detail.php?id=" . $class["id"]) ?>"
			   class="btn btn-primary add-button ex">
				Schüler Hinzufügen
			</a>
		</div>
		<div class="row panel-group">
			<div class="col-xs-12<?= (empty($students)) ? "" : " display-none" ?>">
				<div class="alert alert-danger">
					<strong>Keine Schüler gefunden</strong>
				</div>
			</div>
			<?php
			foreach ($students as $value) {
				?>
				<div class="col-md-3 col-xs-6">
					<div class="panel panel-primary">
						<div class="panel-body">
							<?= $value["headline"] ?>
						</div>
						<div class="panel-footer">
							<img src="<?= $value["content"] ?>">
							<div class="icons">
								<a href="../schueler/edit.php?id=<?= $value["id"] ?>&from=<?= urlencode("klassen/detail.php?id=" . $class["id"]) ?>">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
								<a href="../schueler/do-delete.php?id=<?= $value["id"] ?>&from=<?= urlencode("klassen/detail.php?id=" . $class["id"]) ?>" id="delete">
									<i class="fa fa-times" aria-hidden="true"></i>
								</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>

				<?php
			}
			?>

		</div>
	</div>
</main>
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<script src="../../../../vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../../../../src/view/js/main.js"></script>
</body>
</html>
