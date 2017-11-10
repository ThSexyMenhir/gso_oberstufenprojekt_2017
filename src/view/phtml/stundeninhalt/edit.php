<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("EvaluationSheetController")) {
	include __DIR__ . "/../../../controller/EvaluationSheetController.php";
}

$startdate= isset($startdate) ? $startdate : filter_input(INPUT_GET, "startdate");
$enddate = isset($enddate) ? $enddate : filter_input(INPUT_GET, "enddate");
$block = isset($block) ? $block : filter_input(INPUT_GET, "block");
$date = isset($date) ? $date : filter_input(INPUT_GET, "date");
$idEvaluationSheet = isset($idEvaluationSheet) ? $idEvaluationSheet : filter_input(INPUT_GET, "idEvaluationSheet");
$note = isset($note) ? $note : filter_input(INPUT_GET, "note");

$siteTitle = "Stundeninhalt Bearbeiten";

if(!isset($_SESSION)){
	session_start();
}
$idTeacher = $_SESSION['gso-kalender']['id_lehrer'];

$evaluationSheetController = new EvaluationSheetController();
$evaluationSheets = $evaluationSheetController->getEntitiesForOverview(["id_lehrer" => ["=", $idTeacher]]);

if (!isset($evaluationSheets)) {
	header("Location: index.php?startdate=$startdate&enddate=$enddate");
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
				<input type="hidden" name="startdate" value="<?=$startdate?>">
				<input type="hidden" name="enddate" value="<?=$enddate?>">
				<input type="hidden" name="block" value="<?=$block?>">
				<input type="hidden" name="date" value="<?=$date?>">
                <div class="form-group">
                    <label for="comment">Notizen:</label>
                    <textarea class="form-control" rows="5" name="note"><?=$note?></textarea>
                </div>
				<select class="form-control" name="idEvaluationSheet">
					<?php foreach ($evaluationSheets as $evaluationSheet) { ?>
						<option value="<?= $evaluationSheet["id"] ?>"
							<? if ($idEvaluationSheet === $evaluationSheet["id"]) {
								echo "selected";
							} ?>
						>
							<?= $evaluationSheet["headline"] . ", " . $evaluationSheet["content"] ?>
						</option>
					<?php } ?>
				</select>
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