
<?php
	$siteTitle = "Klassen Details";
?>
<?php
$schueler = array(
	    0 => array(
	         "headline" => "Hans Wurst",
			 "content" => "../../../../src/data/media/img/chimpanzee-screaming.jpg"
	    ),
		1 => array(
			"headline" => "Peter Wurst",
			"content" => "../../../../src/data/media/img/chimpanzee-screaming.jpg"
	    ),
		2 => array(
			"headline" => "Robert Wurst",
			"content" => "../../../../src/data/media/img/chimpanzee-screaming.jpg"
	    ),
		3 => array(
			"headline" => "Hund Wurst",
			"content" => "../../../../src/data/media/img/chimpanzee-screaming.jpg"
	    ),
		4 => array(
			"headline" => "Fritz Wurst",
			"content" => "../../../../src/data/media/img/chimpanzee-screaming.jpg"
	    ),
		5 => array(
			"headline" => "Till Wurst",
			"content" => "../../../../src/data/media/img/chimpanzee-screaming.jpg"
	    )
	);
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
						<button class="btn btn-primary add-button">Einsehen</button>
						<button class="btn btn-primary add-button">Hinzufügen</button>
					</div>
				</div>
				<button class="btn btn-primary add-button ex">Schüler Hinzufügen</button>
			</div>
			<div class="row panel-group">
				<?php
					if(empty($schueler)){
						?>
				<div class="col-xs-12">
					<div class="alert alert-danger">
					  <strong>Keine Schüler gefunden</strong>
					</div>
				</div>
						<?php
					}else {
						foreach ($schueler as $value) {
				?>
				<div class="col-md-3 col-xs-6">
					<div class="panel panel-primary">
						<div class="panel-body">
							<?=$value["headline"]?>
						</div>
						<div class="panel-footer">
							<img src="<?=$value["content"]?>">
							<div class="icons">
								<a><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a><i class="fa fa-times" aria-hidden="true"></i></a>
							</div>
							<div class="clear"></div>
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
