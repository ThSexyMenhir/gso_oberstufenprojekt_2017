<?php
if (!class_exists("TeacherController")) {
    include __DIR__ . "/../../../controller/TeacherController.php";
}

$siteTitle = "Lehrer Übersicht";
include("../../../../header.php");

$teacherController = new TeacherController();
$teachers = $teacherController->getEntities();
?>
<div class="container">
	<div class="row search">
		<div class="btn-group">
			<input id="searchinput" type="search" class="form-control" placeholder="Lehrer Suchen">
		 	<i id="searchclear" class="fa fa-times" aria-hidden="true"></i>
		</div>
		<button class="btn btn-primary active-search">Suchen</button>
		<button class="btn btn-primary add-button">Lehrer Hinzufügen</button>
	</div>
	<div class="row panel-group">
		<?php
			if(empty($teachers)){
				?>
		<div class="col-xs-12">
			<div class="alert alert-danger">
			  <strong>Keine Lehrer gefunden</strong>
			</div>
		</div>
				<?php
			}else {
				foreach ($teachers as $value) {
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
