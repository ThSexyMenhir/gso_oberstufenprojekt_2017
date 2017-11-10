<?php
include __DIR__ . "/../../../../check-login.php";
$siteTitle = "Bewertungsbogen Detailseite";
$student = array(
	'name' => "Hans Wurst",
	"img" => "../../../../src/data/media/img/chimpanzee-screaming.jpg",
	"class" => "FIA52",
	"subject" => "ANW"
);
$reviews = array(
	0 => array(
		"date" => "01.01.2017",
		"review" => "--"
	),
	1 => array(
		"date" => "02.01.2017",
		"review" => "++"
	),
	2 => array(
		"date" => "03.01.2017",
		"review" => "NA"
	),
	3 => array(
		"date" => "04.01.2017",
		"review" => "10%"
	),
	4 => array(
		"date" => "05.01.2017",
		"review" => "Super"
	),
	5 => array(
		"date" => "06.01.2017",
		"review" => "Bester Mann"
	),
	6 => array(
		"date" => "07.01.2017",
		"review" => "Unbeugsam"
	),
	7 => array(
		"date" => "08.01.2017",
		"review" => "Stabil"
	)
);
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../../src/view/css/main.css">
	<link rel="stylesheet" href="../../../../src/view/css/bewertungsbogen/detail.css">
	<link rel="stylesheet" href="../../../../vendor/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../../vendor/bootstrap-3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../../../../vendor/font-awesome.min.css">
	<title>GSO - Kalender</title>
</head>

<body>
<?php include __DIR__ . "/../../../../header.php" ?>
<main>
	<div class="container bewertungsbogen-detail">
		<div class="row">
			<div class="col-md-4 col-xs-12 profile">

				<div class="panel panel-primary">
					<div class="panel-body">
						<?= $student["name"] ?>
					</div>
					<div class="panel-footer">
						<img src="<?= $student["img"] ?>">
						<div class="text">
							<?= $student["class"] ?><br>
							<?= $student["subject"] ?>
						</div>
						<div class="clear"></div>
					</div>
				</div>

			</div>
			<div class="col-md-8 col-xs-12">
				<table class="table">
					<thead>
					<tr>
						<th>Datum</th>
						<th>Bewertung</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($reviews as $value) { ?>
						<tr>
							<td><?= $value["date"] ?></td>
							<td><?= $value["review"] ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<script src="../../../../vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../../../../src/view/js/main.js"></script>
</body>
</html>
