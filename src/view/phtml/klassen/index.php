<?php
	$siteTitle = "Klassen Übersicht";
	include("../../../../header.php");
?>&
<?php
$classes = array(
	    0 => array(
	         "headline" => "FIA 51"
	    ),
		1 => array(
	         "headline" => "FIA 52"
	    ),
		2 => array(
	         "headline" => "FIA 53"
	    ),
		3 => array(
	         "headline" => "FIA 54"
	    ),
		4 => array(
	         "headline" => "FIA 55"
	    ),
		5 => array(
	         "headline" => "FIA 56"
	    )
	);
$classController = new ClassController();
$classes = $classController->getEntities();
?>
<div class="container">
	<div class="row search">
		<div class="btn-group">
			<input id="searchinput" type="search" class="form-control" placeholder="Klasse Suche">
		 	<i id="searchclear" class="fa fa-times" aria-hidden="true"></i>
		</div>
		<button class="btn btn-primary active-search">Suchen</button>
		<button class="btn btn-primary add-button">Klasse Hinzufügen</button>
	</div>
	<div class="row panel-group">
		<?php
			if(empty($classes)){
		?>
		<div class="col-xs-12">
			<div class="alert alert-danger">
			  <strong>Keine Klassen gefunden</strong>
			</div>
		</div>
		<?php
			}else {
				foreach ($classes as $value) {
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
<?php include("../../../../footer.php");
