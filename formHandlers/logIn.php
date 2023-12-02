<?php
require_once("../classes/classes.php");

// trim() is used to remove empty spaces at the start and at the end of string
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

$testUser = new UserDB();
if ($testUser->LogInUser($email, $password)) 
{   
    setcookie('logged_in', $email, time() + 3600 * 24 * 14, '/'); 
    header("location: ../views/feedPage.php");
    exit;
} 
else 
{
    echo 'The username or password are incorrect!';
}
