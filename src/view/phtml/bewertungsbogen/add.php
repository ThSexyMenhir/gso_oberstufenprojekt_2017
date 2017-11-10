<?php
include __DIR__ . "/../../../../check-login.php";
$siteTitle = "Bewertungsbogen Hinzufügen";

$class =(
    array(
        array(
            "idClass" => "1",
            "class" => "FIA51",
        ),array(
            "idClass" => "2",
            "class" => "FIA52",
        ),
        array(
            "idClass" => "3",
            "class" => "FIA53",
        ),
    )
);

$subject =(
    array(
        array(
            "idSubject" => "1",
            "subject" => "ANW",
        ),array(
            "idSubject" => "2",
            "subject" => "ITK",
        ),
        array(
            "idSubject" => "3",
            "subject" => "FE",
        ),
    )
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
		<form action="do-edit.php" method="POST">
			<div class="row">

                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="form-group col-md-12 col-xs-12">
                            <label for="idClass">Klasse:</label>
                            <select class="form-control" name="idClass">
                                <?php foreach ($class as $classes) { ?>
                                    <option value="<?= $classes["idClass"] ?>">
                                        <?= $classes["class"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <label for="idSubject">Fach:</label>
                            <select class="form-control" name="idSubject">
                                <?php foreach ($subject as $subjects) { ?>
                                    <option value="<?= $subjects["idSubject"] ?>">
                                        <?= $subjects["subject"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <button type="submit" class="btn btn-default pull-left btn-success">Speichern</button>
                            <a href="index.php" class="btn btn-default pull-right btn-danger">Zurück</a>
                        </div>
                    </div>
                </div>


			</div>
		</form>
	</div>
</main>
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<script src="../../../../vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../../../../src/view/js/main.js"></script>
</body>
</html>