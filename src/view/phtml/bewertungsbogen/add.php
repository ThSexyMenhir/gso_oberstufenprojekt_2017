<?php
include __DIR__ . "/../../../../check-login.php";
if (!class_exists("ClassController")) {
	include __DIR__ . "/../../../controller/ClassController.php";
}
if (!class_exists("SubjectController")) {
	include __DIR__ . "/../../../controller/SubjectController.php";
}

$siteTitle = "Bewertungsbogen Hinzufügen";

$classController = new ClassController();
$class = $classController->getEntitiesForOverview();

$subjectController = new SubjectController();
$subject = $subjectController->getEntitiesForOverview();
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
		<form action="do-add.php" method="POST">
			<div class="row">

                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="form-group col-md-12 col-xs-12">
                            <label for="idClass">Klasse:</label>
                            <select class="form-control" name="idClass">
                                <?php foreach ($class as $classes) { ?>
                                    <option value="<?= $classes["id"] ?>">
                                        <?= $classes["headline"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <label for="idSubject">Fach:</label>
                            <select class="form-control" name="idSubject">
                                <?php foreach ($subject as $subjects) { ?>
                                    <option value="<?= $subjects["id"] ?>">
                                        <?= $subjects["content"] ?>
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