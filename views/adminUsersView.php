<?php
require_once("../classes/classes.php");


/*
require_once('template.php');
define('TEMPLATES_PATH', '../templates');
$template = new Template(TEMPLATES_PATH . '/menu.php');
$template->show();*/

require_once("../templates/menu.php");

$userObj = new UserDB();
$deleteUser = new UserDB();

if (isset($_GET['del'])) 
{
    $id = $_GET['del'];
    $deleteUser = $deleteUser->DeleteUser($id);
}
$userObj = $userObj->getUsers();

?>

<html>

<body class="light-theme" id="data-div">
  <div class="a-row">
    <div class="a-left">

      <?php foreach ($userObj as $user) : ?>
        <div class="a-card">
          <div class="postFunctions">
            <?php 
              echo '<a href="editUsers.php?id=' . $user['Id'] . '"><i class="fa fa-edit fa-2x"></i></a>';
              echo '<a onclick="deleteUser(' . $user['Id'] . ')"><i class="fa fa-times fa-2x"></i></a>';
              ?>
          </div>
          <h3><?php echo $user['Name']; echo " "; echo $user['Type'] ?></h3>
          <p>Email: <?php echo $user['Email'] ?></p>
          <p>Phone number: <?php echo $user['Number'] ?></p>
          <?php echo '<p><a href="profilePage.php?user=' . $user['Id'] . '">View their posts</a></p>'; ?>

        </div>
      <?php endforeach ?>

      
      <script src="../js/scripts.js"></script>
</body>

</html>