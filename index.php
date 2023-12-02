<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="a-image-box">
    <ul class="flex-container">
      <li class="flex-item-left">
        <div class="y-Left-Info">
          <h1>
            Share your ideas, work with friends, change the world!
          </h1>
        </div>
      </li>
      <li class="flex-item-right">
        <form class="y-Log-In" action="formHandlers/logIn.php" method="POST">
          <h1>Login to your Account</h1>
          <label><i class="fa fa-user"></i></i></label><br>
          <input required type="email" id="email" name="email" placeholder="Email" /><br>
          <label><i class="fa fa-unlock"></i></label><br>
          <input required type="password" id="password" name="password" placeholder="Password" />
          <br />
          <input type="checkbox" onclick="toggleShowPassword()"> Show Password

          <center>
            <button id="a-submit" class="" type="submit">Log In</button>
            <br><br>
            <a href="views/registrationPage.php" class="a-register">New? Make an account!</a>
          </center>
        </form>
      </li>
    </ul>
  </div>
  <script src="js/scripts.js"></script>

</body>

</html>