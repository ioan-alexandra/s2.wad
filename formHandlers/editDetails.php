<?php
require_once("../classes/classes.php");

$testObj = new UserDB();

$tempname = $_FILES["image"]["tmp_name"];
if ($_FILES["image"]["name"]) {
    $blob = fopen($tempname, 'rb');
}
else{
    $blob =  $testObj->getUsersId($_POST['id'])["Image"];
}
$user = $testObj->UpdateLoggedUser($_POST['id'], $_POST['name'], $_POST['email'], $_POST['password'], $blob);


header("location: ../views/profilePage.php");
?>