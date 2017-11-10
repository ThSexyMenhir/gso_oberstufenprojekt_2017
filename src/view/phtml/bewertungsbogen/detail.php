<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("EvaluationSheetController")) {
	include __DIR__ . "/../../../controller/EvaluationSheetController.php";
}

$siteTitle = "Bewertungsbogen Details";

$id = isset($id) ? $id : filter_input(INPUT_GET, "id");

if (!isset($id)) {
	header("Location: index.php");
	exit;
}

$evaluationSheetController = new EvaluationSheetController();
$evaluationSheet = $evaluationSheetController->getEntityForDetail($id);

if (!$evaluationSheet) {
	header("Location: index.php");
	exit;
}

$students = $evaluationSheet["students"];
$subjectDates = $evaluationSheet["subjectDates"];
$evaluations = $evaluationSheet["evaluations"];
?>
<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("EvaluationSheetController")) {
	include __DIR__ . "/../../../controller/EvaluationSheetController.php";
}

$siteTitle = "Bewertungsbogen Details";

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
	<link rel="stylesheet" href="../../css/bewertungsbogen/detail.css">
	<title>GSO - Kalender</title>
</head>

<body>
<?php include __DIR__ . "/../../../../header.php" ?>
<main>
	<div class="container">
		<div class="row text-center">
			<h2><?= $evaluationSheet["class"] ?></h2>
			<h3><?= $evaluationSheet["subject"] ?></h3>
		</div>
		<div class="col-xs-3 schueler-liste">
			<table class="table info_spalte_bewertungsbogen">
				<thead>
				<tr>
					<th>Name</th>
				</tr>
				</thead>

				<tbody>
				<?php
				foreach ($evaluations as $key => $value) {
					echo "
                    <tr class=\"name-students-list student-name id-student-$key\" id=\"$key\">
                        <td>" . $students[$key] . "</td>
                    </tr>";
				}
				?>
				</tbody>
			</table>
		</div>
		<div class="col-xs-9 bewertungsbogen">
			<table class="table">
				<thead>
				<tr>
					<?php
					foreach ($subjectDates as $date) {
						echo "<th>" . $date . "</th>";
					}
					?>
				</tr>
				</thead>

				<tbody>
				<?php
				foreach ($evaluations as $idStudent => $data) {
					?>
					<tr class="student-evaluation id-student-<?=$idStudent?>">
						<?php
						foreach ($data as $evaluationlesson) {
							?>
							<td>
								<form action="do-edit.php" method="POST">
									<div class="input-group">
										<input type="hidden" name="idStudent" value="<?=$idStudent?>">
										<input type="hidden" name="idSubjectContent" value="<?=$evaluationlesson["idSubjectContent"]?>">
										<input type="hidden" name="idEvaluationSheet" value="<?=$id?>">
										<input type="text" class="form-control evaluation-input"
											   style="width: 100px;" value="<?= $evaluationlesson["note"] ?>" name="note">
										<div class="input-group-btn">
											<button type="submit" class="btn btn-success">
												<i class="fa fa-check"></i>
											</button>
										</div>
									</div>
								</form>
							</td>
							<?php
						}
						?>
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="container btn-row">
		<div class="col-xs-12">
			<a href="index.php" type="button" class="btn btn-primary">
				Zurück
			</a>
		</div>
	</div>
</main>
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<script src="../../../../vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../../../../src/view/js/main.js"></script>
<script src="../../../../src/view/js/bewertungsbogen/index.js"></script>
</body>
</html>