
<?php
	$siteTitle = "Schüler Übersicht";
	include("../../../../header.php");
?>
<?php
$schueler = array(
	    0 => array(
	         "headline" => "Hans Wurst",
			 "content" => "FIA51"
	    ),
		1 => array(
			"headline" => "Peter Wurst",
			"content" => "FIA51"
	    ),
		2 => array(
			"headline" => "Robert Wurst",
			"content" => "FIA52"
	    ),
		3 => array(
			"headline" => "Hund Wurst",
			"content" => "FIA53"
	    ),
		4 => array(
			"headline" => "Fritz Wurst",
			"content" => "FIA56"
	    ),
		5 => array(
			"headline" => "Till Wurst",
			"content" => "FIA67"
	    )
	);
?>
<div class="container">
	<div class="row search">
		<div class="btn-group">
			<input id="searchinput" type="search" class="form-control" placeholder="Schüler Suchen">
		 	<i id="searchclear" class="fa fa-times" aria-hidden="true"></i>
		</div>
		<button class="btn btn-primary active-search">Suchen</button>
		<button class="btn btn-primary add-button">Schüler Hinzufügen</button>
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
