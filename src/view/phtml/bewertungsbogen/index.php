
<?php
$siteTitle = "Bewertungsbogen Übersicht";
include("../../../../header.php");
?>
<?php
$ScoreSheet = array(
    0 => array(
        "headline" => "FIA51",
        "content" => "ANW"
    ),
    1 => array(
        "headline" => "FIA51",
        "content" => "ITK"
    ),
    2 => array(
        "headline" => "FIA51",
        "content" => "WUG"
    ),
    3 => array(
        "headline" => "FIA52",
        "content" => "ANW"
    ),
    4 => array(
        "headline" => "FIA52",
        "content" => "ITK"
    ),
    5 => array(
        "headline" => "FIA53",
        "content" => "ANW"
    )
);
?>
<div class="container">
    <div class="row search">
        <div class="btn-group">
            <input id="searchinput" type="search" class="form-control" placeholder="Bewertungsbogen Suchen">
            <i id="searchclear" class="fa fa-times" aria-hidden="true"></i>
        </div>
        <button class="btn btn-primary active-search">Suchen</button>
        <button class="btn btn-primary add-button">Bewertungsbogen Hinzufügen</button>
    </div>
    <div class="row panel-group">
        <?php
        if(empty($ScoreSheet)){
            ?>
            <div class="col-xs-12">
                <div class="alert alert-danger">
                    <strong>Kein Bewertungsbogen gefunden</strong>
                </div>
            </div>
            <?php
        }else {
            foreach ($ScoreSheet as $value) {
                ?>
                <div class="col-md-3 col-xs-6">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <?=$value["headline"]?>
                        </div>
                        <div class="panel-footer">
                            <div class="text">
                                <?=$value["content"]?>
                            </div>
                            <div class="icons">
                                <a><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a><i class="fa fa-times" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>

    </div>
</div>
<?php include("../../../../footer.php"); ?>
