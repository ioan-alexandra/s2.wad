<?php
require_once("../classes/classes.php");

$testObj = new ContentDB();

$tempname = $_FILES["image"]["tmp_name"];
if ($_FILES["image"]["name"]) {
    $blob = fopen($tempname, 'rb');
}
else{
    $blob =  $testObj->getSelectedPosts($_POST['id'])["Image"];
}
$content = $testObj->updatePost($_POST['id'], $_POST['title'], $_POST['description'], $_POST['label'], $blob);


header("location: ../views/feedPage.php");
