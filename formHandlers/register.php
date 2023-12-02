<?php
require_once("../classes/classes.php");

$testObj = new UserDB();
$testObj->setUsersStmt($_POST['name'], $_POST['email'], $_POST['number'], $_POST['password'], "USER");

header("location: ../index.php");

?>