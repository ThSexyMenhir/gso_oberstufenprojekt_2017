<?php
include __DIR__ . "/../../../../check-login.php";

$startDate = isset($startDate) ? $startDate : filter_input(INPUT_POST, "startDate");
$endDate = isset($endDate) ? $endDate : filter_input(INPUT_POST, "endDate");



if (!$success) {
	header("Location: index.php");
	exit;
}

header("Location: index.php");
exit;