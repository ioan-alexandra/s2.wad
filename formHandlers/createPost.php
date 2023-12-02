<?php
require_once("../classes/classes.php");
$tempname = $_FILES["image"]["tmp_name"];
if ($_FILES["image"]["name"]) {
    $blob = fopen($tempname, 'rb');
}
else{
    $blob =  null;
}

$testObj = new ContentDB();
$testObj2 = new UserDB();   
$content = $testObj->createPost($testObj2->getUsersStmt($_SESSION["email"]), $_POST['title'], date("Y-m-d"), $_POST['description'], "0", "0", $blob, $_POST['label']);

header("location: ../views/feedPage.php");
?>