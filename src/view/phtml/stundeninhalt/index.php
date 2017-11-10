<?php
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}


$siteTitle = "Wochenansicht";
$counterBlock = 0;
$counterModal = 0;



$subjectBlock = array(
    0 => array(
        "monday" => array(
            "teacher" => "WZ",
            "class" => "FIA 51",
            "subject" => "WUG",
            "shortDescription" => "Rechnung",
            "description" => "sjkhgfd sdfkjshd kjfhasdkj fh",
        ),
        "tuesday" => array(
            "teacher" => "NL",
            "class" => "FIA 52",
            "subject" => "ANW",
            "shortDescription" => "Programieren",
            "description" => "Hier kann ein langer Text stehen"
        ),
        "wednesday" => array(
            "teacher" => "PL",
            "class" => "FIA 53",
            "subject" => "ITK",
            "shortDescription" => "Netzwerk",
            "description" => "sk.dh klsajdhf lkjasdfhkljashdf kljashdfk "
        ),
        "thursday" => array(

        ),
        "friday" => array(
            "teacher" => "ND",
            "class" => "FIA 55",
            "subject" => "Geschichten",
            "shortDescription" => "Geschichten",
            "description" => "Hier kann ein langer Text stehen",
        ),
    ),
    1 => array(
        "monday" => array(
            "teacher" => "WZ",
            "class" => "FIA 51",
            "subject" => "WUG",
            "shortDescription" => "Rechnung",
            "description" => "Hier kann ein langer Text stehen",
        ),
        "tuesday" => array(
            "teacher" => "NL",
            "class" => "FIA 52",
            "subject" => "ANW",
            "shortDescription" => "Programieren",
            "description" => "Hier kann ein langer Text stehen"
        ),
        "wednesday" => array(
            "teacher" => "PL",
            "class" => "FIA 53",
            "subject" => "ITK",
            "shortDescription" => "Netzwerk",
            "description" => "Hier kann ein langer Text stehen"
        ),
        "thursday" => array(

        ),
        "friday" => array(
            "teacher" => "ND",
            "class" => "FIA 55",
            "subject" => "Geschichten",
            "shortDescription" => "Geschichten",
            "description" => "Hier kann ein langer Text stehen",
        ),
    ),
    2 => array(
        "monday" => array(
            "teacher" => "WZ",
            "class" => "FIA 51",
            "subject" => "WUG",
            "shortDescription" => "Rechnung",
            "description" => "Hier kann ein langer Text stehen",
        ),
        "tuesday" => array(
            "teacher" => "NL",
            "class" => "FIA 52",
            "subject" => "ANW",
            "shortDescription" => "Programieren",
            "description" => "Hier kann ein langer Text stehen"
        ),
        "wednesday" => array(
            "teacher" => "PL",
            "class" => "FIA 53",
            "subject" => "ITK",
            "shortDescription" => "Netzwerk",
            "description" => "Hier kann ein langer Text stehen"
        ),
        "thursday" => array(

        ),
        "friday" => array(
            "teacher" => "ND",
            "class" => "FIA 55",
            "subject" => "Geschichten",
            "shortDescription" => "Geschichten",
            "description" => "Hier kann ein langer Text stehen",
        ),
    ),
    3 => array(
        "monday" => array(
            "teacher" => "WZ",
            "class" => "FIA 51",
            "subject" => "WUG",
            "shortDescription" => "Rechnung",
            "description" => "Hier kann ein langer Text stehen",
        ),
        "tuesday" => array(
            "teacher" => "NL",
            "class" => "FIA 52",
            "subject" => "ANW",
            "shortDescription" => "Programieren",
            "description" => "Hier kann ein langer Text stehen"
        ),
        "wednesday" => array(
            "teacher" => "PL",
            "class" => "FIA 53",
            "subject" => "ITK",
            "shortDescription" => "Netzwerk",
            "description" => "Hier kann ein langer Text stehen"
        ),
        "thursday" => array(

        ),
        "friday" => array(
            "teacher" => "ND",
            "class" => "FIA 55",
            "subject" => "Geschichten",
            "shortDescription" => "Geschichten",
            "description" => "Hier kann ein langer Text stehen",
        ),
    ),
    4 => array(
        "monday" => array(

        ),
        "tuesday" => array(

        ),
        "wednesday" => array(

        ),
        "thursday" => array(

        ),
        "friday" => array(

        ),
    ),
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
	<link rel="stylesheet" href="../../../../src/view/css/stundeninhalt/index.css">
	<title>GSO - Kalender</title>
</head>

<body>
<?php include __DIR__ . "/../../../../header.php" ?>
<main>
<div class="container-fluid">
<div class="row header-row">
	<a><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
	Datum Anfang - Datum Ende
	<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
	<div class="pull-right">
		<a><i class="fa da-ellipsis-v" aria-hidden="true"></i></a>
	</div>
</div> <!-- ./row -->
</div> <!-- ./container -->

<div class="container class-shedule">
<div class="row">
	<div class="col-xs-2">
		Zeit
	</div>
	<div class="col-xs-2">
		Montag
	</div>
	<div class="col-xs-2">
		Dienstag
	</div>
	<div class="col-xs-2">
		Mittwoch
	</div>
	<div class="col-xs-2">
		Donnerstag
	</div>
	<div class="col-xs-2">
		Freitag
	</div>
</div>

<?php
foreach ($subjectBlock as $datas){

?>
<div class="row">
	<div class="col-xs-2">
		<?php
			if ($counterBlock == 0){
				echo "07:45 - 09:15";
			}
			if ($counterBlock == 1){
				echo "09:35 - 11:05";
			}
			if ($counterBlock == 2){
				echo "11:25 - 12:55";
			}
			if ($counterBlock == 3){
				echo "13:15 - 14:45";
			}
			if ($counterBlock == 4){
				echo "15:05 - 16:35";
			}
		$counterBlock ++;
		?>
	</div>


	<?php foreach ($datas as $block) {
		if (!count($block) == 0) { ?>

			<div class="col-xs-2" data-toggle="modal" data-target="#myModal<?= $counterModal;?>">
				<div class="subject-box-filled">
					<div class="row">
						<div class="col-xs-7 text-left no-padding-right">
							<?= $block["shortDescription"]; ?>
							<?= $block["teacher"]; ?>
						</div>
						<div class="col-xs-5 icons text-right">
							<a><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-7 text-left no-padding-right">
							<?= $block["class"]; ?>
							<?= $block["subject"]; ?>
						</div>
						<div class="col-xs-5 icons text-right">
							<a><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="myModal<?= $counterModal;?>" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Modal Header</h4>
						</div>

						<div class="modal-body">
							<?= $block["description"]; ?>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Schließen</button>
						</div>

					</div>

				</div>
			</div>

			<?php
			$counterModal++;
		} else { ?>
			<div class="col-xs-2">
				<div class="subject-box">
					<br>
					<div class="icons text-right">
						<a><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>

			<?php
		}
	}
	?>
</div>
<?php
}
?>
</div>
</main>
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<script src="../../../../vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../../../../src/view/js/main.js"></script>
</body>
</html>