<?php
$evaluationSheet = array(
	"class" => "FIA52",
	"subject" => "ANW",
	"subjectDate" => array(
		"01.01.2017",
		"02.01.2017",
		"03.01.2017",
		"04.01.2017",
		"05.01.2017",
		"06.01.2017",
	),
);

$students = array(
	"Hans Wurst" => array(
		"++",
		"",
		"",
		"",
		"",
		"",
	),
	"Timo Wurst " => array(
		"",
		"++",
		"",
		"",
		"",
		"",
	),
	"Thomas Wurst " => array(
		"",
		"",
		"++",
		"",
		"",
		"",
	),
	"Tobias Wurst" => array(
		"",
		"++",
		"",
		"",
		"",
		"",
	),
	"Tino Wurst" => array(
		"",
		"",
		"",
		"",
		"",
		"++",
	),
	"Tebo Wurst" => array(
		"",
		"",
		"",
		"",
		"++",
		"",
	),
)

?>
<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}

$siteTitle = "Klassen Übersicht";

$classController = new ClassController();
$classes = $classController->getEntitiesForOverview([], ['bezeichnung']);
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
	<link rel="stylesheet" href="../../../../src/view/css/bewertungsbogen/index.css">
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
				foreach ($students as $key => $value) {
					echo "
                    <tr class=\"name-students-list\">
                        <td>" . $key . "</td>
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
					foreach ($evaluationSheet["subjectDate"] as $date) {
						echo "<th>" . $date . "</th>";
					}
					?>
				</tr>
				</thead>

				<tbody>
				<?php
				foreach ($students as $data) {
					?>
					<tr>
						<?php
						foreach ($data as $evaluationlesson) {
							?>
							<td>
								<form>
									<div class="input-group">
										<input type="text" class="form-control evaluation-input"
											   style="width: 100px;" placeholder="<?= $evaluationlesson ?>">
										<div class="input-group-btn">
											<a href="do-save.php" type="submit" class="btn btn-success">
												<i class="fa fa-pencil"></i>
											</a>
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
			<a href="index.php" type="button" class="btn btn-info">
				Speichern
			</a>
		</div>
	</div>
</main>
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<script src="../../../../vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../../../../src/view/js/main.js"></script>
</body>
</html>