<?php
require_once("../classes/classes.php");

$labelObj = new LabelDB();
$label = $labelObj->insertLabels($_POST['name']);

header("location: ../views/adminLabelsView.php");
?>