<?php

require_once("../classes/classes.php");
require_once("../templates/menu.php");

$testObj = new UserDB();
$user = $testObj->getUsersId($_GET['id']);

?>

<html>

  <head>
    <link rel="stylesheet" href="styl.css" />
  </head>

  <body>
    <div class="fields"> 
        <form method="POST" action="../formHandlers/editUser.php" class='createPost' target="_self" enctype="multipart/form-data"> <br>
            Name: <input type="text" name="name" value = "<?php echo $user['Name']?>" /><br>
            Email: <input type="email" name="email" value = "<?php echo $user['Email'] ?>" /><br>
            Phone: <input type="text" name="phone" value = "<?php echo $user['Number'] ?>" /><br>
            Password: <input type="password" name="password" value = "<?php echo $user['Password'] ?>" /><br>
            <input type="text" name="id" hidden value = "<?php echo $user['Id']?>" /><br>
            <input type="file" name="image"><br>
            <button class ="btn" type = "submit"><i class="fa fa-cog"></i> Edit personal info</button><br>
        </form>
        <?php if ($user['Image'])
            echo '<img class = "post-image" src = "data:image/png;base64,' . base64_encode($user['Image']) . '" />'; ?>
      </div>
  </body>
</html>