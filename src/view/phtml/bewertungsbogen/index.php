<?php
if (!class_exists("EvaluationSheetController")) {
	include __DIR__ . "/../../../controller/EvaluationSheetController.php";
}

$siteTitle = "Bewertungsbogen Übersicht";

$evaluationSheetController = new EvaluationSheetController();
$evaluationSheets = $evaluationSheetController->getEntitiesForOverview([], ['id_klasse']);
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
		<div class="row search">
			<div class="btn-group">
				<input id="searchinput" type="search" class="form-control" placeholder="Bewertungsbogen Suchen">
				<i id="searchclear" class="fa fa-times" aria-hidden="true"></i>
			</div>
			<button id="searchButton" class="btn btn-primary active-search">Suchen</button>
			<a href="add.php" class="btn btn-primary add-button">Bewertungsbogen hinufügen</a>
		</div>
		<div class="row panel-group">
				<div class="col-xs-12<?= (empty($evaluationSheets)) ? '':' display-none'?>">
					<div class="alert alert-danger">
						<strong>Kein Bewertungsbogen gefunden</strong>
					</div>
				</div>
				<?php
				foreach ($evaluationSheets as $value) {
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
									<a href="edit.php?id=<?= $value["id"] ?>">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</a>
									<a href="do-delete.php?id=<?= $value["id"] ?>" id="delete">
										<i class="fa fa-times" aria-hidden="true"></i>
									</a>
								</div>
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
<script src="../../../../src/view/js/bewertungsbogen/index.js"></script>
</body>
</html>
