<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/5e9ae6c84a.js" crossorigin="anonymous"></script>
</head>

<body class="light-theme">
  <div clas="a-vertical-menu" id="myMenu">
    <nav class="main-menu" id="resp">
      <ul>
        <li>
          <a href="feedPage.php">
            <i class="fa fa-home fa-2x"></i>
            <span class="nav-text"> Home </span>
          </a>
        </li>
        <li class="has-subnav">
          <a href="profilePage.php">
            <i class="fa fa-user fa-2x"></i>
            <span class="nav-text"> Profile Page </span>
          </a>
        </li>
        <?php 
        if ($_SESSION['type'] == "ADMIN") : ?>
          <li class="has-subnav">
            <a href="adminUsersView.php">
              <i class="fas fa-users-cog fa-2x"></i>
              <span class="nav-text"> Users </span>
            </a>
          </li>
          <li class="has-subnav">
            <a href="adminLabelsView.php">
            <i class="fas fa-tags fa-2x"></i></i>
              <span class="nav-text"> Labels </span>
            </a>
          </li>
        <?php endif; ?>
        <li>
          <a href="#">
            <i class="fa fa-gear fa-2x"></i>
            <span class="nav-text"> Settings </span>
          </a>
        </li>
        <li>
          <a href="../views/contact.php">
            <i class="fa fa-send fa-2x"></i>
            <span class="nav-text"> Contact </span>
          </a>
        </li>
      </ul>

      <ul class="logout">
        <li>
          <a onclick="dark()" href="javascript:void(0);">
            <div id="theme"></div>
            <i class="fa fa-lightbulb-o fa-2x" aria-hidden="true"></i>
            <span class="nav-text"> Dark Mode </span>
          </a>
        </li>
        <li><a onclick="logout()">
            <i class="fa fa-power-off fa-2x"></i>
            <span class="nav-text">Log Out </span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="topnav">
    <div class="a-search-bar">
      <input id="searchString" type="text" onkeypress="return searchKeyPress(event);" placeholder="Search.." />
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i></a>
    </div>
  </div>
  <script src="../js/scripts.js"></script>