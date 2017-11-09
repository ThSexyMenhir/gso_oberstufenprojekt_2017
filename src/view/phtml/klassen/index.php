<?php
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}

$siteTitle = "Klassen Übersicht";
$classes = array(
	0 => array(
		"headline" => "FIA 51"
	),
	1 => array(
		"headline" => "FIA 52"
	),
	2 => array(
		"headline" => "FIA 53"
	),
	3 => array(
		"headline" => "FIA 54"
	),
	4 => array(
		"headline" => "FIA 55"
	),
	5 => array(
		"headline" => "FIA 56"
	)
);
$classController = new ClassController();
$classes = $classController->getEntities();
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
	<link rel="stylesheet" href="../../../../src/view/css/stundeninhalt/index.css">
	<title>GSO - Kalender</title>
</head>

<body>
<?php include __DIR__ . "/../../../../header.php" ?>
<main>
	<div class="container">
		<div class="row search">
			<div class="btn-group">
				<input id="searchinput" type="search" class="form-control" placeholder="Klasse Suche">
				<i id="searchclear" class="fa fa-times" aria-hidden="true"></i>
			</div>
			<button class="btn btn-primary active-search">Suchen</button>
			<button class="btn btn-primary add-button">Klasse Hinzufügen</button>
		</div>
		<div class="row panel-group">
			<?php
			if (empty($classes)) {
				?>
				<div class="col-xs-12">
					<div class="alert alert-danger">
						<strong>Keine Klassen gefunden</strong>
					</div>
				</div>
				<?php
			} else {
				foreach ($classes as $value) {
					?>
					<div class="col-md-3 col-xs-6">
						<div class="panel panel-primary">
							<div class="panel-body">
								<?= $value["headline"] ?>
							</div>
							<div class="panel-footer">
								<div class="text">
									<?= $value["content"] ?>
								</div>
								<div class="icons">
									<a><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a><i class="fa fa-times" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>

					<?php
				}
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

