
<?php
	$siteTitle = "Stunden Übersicht";
	include("../../../../header.php");
?>
<?php
$subjects = array(
	    0 => array(
	         "headline" => "Deutsch",
			 "content" => "DE"
	    ),
		1 => array(
			"headline" => "Englisch",
			"content" => "EN"
	    ),
		2 => array(
			"headline" => "Anwendungsentwickler",
			"content" => "ANW"
	    ),
		3 => array(
			"headline" => "Sport",
			"content" => "SP"
	    )
	);
?>
<div class="container">
	<div class="row search">
		<div class="btn-group">
			<input id="searchinput" type="search" class="form-control" placeholder="Stunden Suchen">
		 	<i id="searchclear" class="fa fa-times" aria-hidden="true"></i>
		</div>
		<button class="btn btn-primary active-search">Suchen</button>
		<button class="btn btn-primary add-button">Stunden Hinzufügen</button>
	</div>
	<div class="row panel-group">
		<?php
			if(empty($subjects)){
				?>
		<div class="col-xs-12">
			<div class="alert alert-danger">
			  <strong>Keine Stunden gefunden</strong>
			</div>
		</div>
				<?php
			}else {
				foreach ($subjects as $value) {
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
