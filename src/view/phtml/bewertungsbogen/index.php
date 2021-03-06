<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("EvaluationSheetController")) {
	include __DIR__ . "/../../../controller/EvaluationSheetController.php";
}

$siteTitle = "Bewertungsbogen Übersicht";
if(!isset($_SESSION)){
    session_start();
}
$idTeacher = $_SESSION['gso-kalender']['id_lehrer'];
$evaluationSheetController = new EvaluationSheetController();
$evaluationSheets = $evaluationSheetController->getEntitiesForOverview(
	["id_lehrer" => ["=", $idTeacher]]
);
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
				<input id="searchinput" type="search" class="form-control" placeholder="Klasse Suche">
				<i id="searchclear" class="fa fa-times" aria-hidden="true"></i>
			</div>

			<button id="searchButton" class="btn btn-primary active-search">Suchen</button>
			<a href="add.php" class="btn btn-primary add-button">Bewertungsbogen Hinzufügen</a>
		</div>
		<div class="row panel-group">
			<div class="col-xs-12<?= (empty($evaluationSheets)) ? '' : ' display-none' ?>">
				<div class="alert alert-danger">
					<strong>Keine Bewertungsbogen gefunden</strong>
				</div>
			</div>
			<?php
			if (isset($evaluationSheets)) {
				foreach ($evaluationSheets as $value) {
					?>
					<a href="detail.php?id=<?= $value["id"] ?>">
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
									</div>
								</div>
							</div>
						</div>
					</a>

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
