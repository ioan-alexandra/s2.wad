<?php
require_once("../classes/classes.php");

$labelObj = new LabelDB();

$label = $labelObj->updateLabel($_POST['id'], $_POST['name']);


header("location: ../views/adminLabelsView.php");
