<?php
$siteTitle = "Tagesansicht";
$counterBlock = 0;




$subjectBlock = array(
    0 => array(
        "teacher" => "WZ",
        "class" => "FIA 51",
        "subject" => "WUG",
        "shortDescription" => "Rechnung",
        "description" => "sjkhgfd sdfkjshd kjfhasdkj fh",
    ),
    1 => array(
        "teacher" => "WZ",
        "class" => "FIA 51",
        "subject" => "WUG",
        "shortDescription" => "Rechnung",
        "description" => "sjkhgfd sdfkjshd kjfhasdkj fh",
    ),
    2 => array(
        "teacher" => "WZ",
        "class" => "FIA 51",
        "subject" => "WUG",
        "shortDescription" => "Rechnung",
        "description" => "sjkhgfd sdfkjshd kjfhasdkj fh",
    ),
    3 => array(
        "teacher" => "WZ",
        "class" => "FIA 51",
        "subject" => "WUG",
        "shortDescription" => "Rechnung",
        "description" => "sjkhgfd sdfkjshd kjfhasdkj fh",
    ),
    4 => array(

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
    <link rel="stylesheet" href="../../../../src/view/css/stundeninhalt/dayview.css">
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
<div class="container">
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

            <?php
                if (!count($datas) == 0) { ?>

                    <div class="col-xs-10 subject-box-filled">
                        <div class="col-xs-10">
                            asdsasda d sdfas dfasdf asdf asdf
                        </div>
                        <div class="col-xs-2 icons text-right">
                            <a><i class="fa fa-times fa-3x" aria-hidden="true"></i></a>
                            <a><i class="fa fa-pencil fa-3x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php
                }else{  ?>
                    <div class="col-xs-10 subject-box">
                        <div class="col-xs-10">

                            <br>
                        </div>
                        <div class="col-xs-2 icons text-right">
                            <a><i class="fa fa-pencil fa-3x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php
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