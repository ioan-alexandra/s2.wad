<?php
require_once("../classes/classes.php");
?>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="a-image-box" style="
        --image-url: url(https://www.incimages.com/uploaded_files/image/1920x1080/getty_829578104_200013331653767174292_382164.jpg);
      ">
    <ul class="flex-container">
      <li class="flex-item-left">

        <form class="y-Log-In" method="POST" id="myForm" target="_self" action="../formHandlers/register.php">
          <label>Your Name</label><br>
          <input type="text" id="name" name="name">

          <label>Your Email Address</label><br>
          <input required type="email" id="email" name="email">

          <label>Your Phone Number</label><br>
          <input type="text" id="number" name="number">

          <label>Password</label><br>
          <input required type="password" name="password">

          <button id="a-submit" class="a-button-style" type="submit">Register</button>
          <br><br>
            <center><a href="../index.php" class="a-register">Already have an account? Log In!</a></center>
        </form>
      </li>
    </ul>
  </div>


</body>

</html>