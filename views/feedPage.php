<?php

require_once("../classes/classes.php");

//require_once 'template.php';

//define('TEMPLATES_PATH', '../templates');
//$template = new Template(TEMPLATES_PATH . '/menu.php');
//$template->show();
require_once("../templates/menu.php");
$testObj3 = new UserDB();

$testObj2 = new LabelDB();
$labels = $testObj2->getLabels();
$getLabel = new LabelDB();
$testObj = new ContentDB();
$content = $testObj->getPublishedPosts();

if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $selectedPost = $testObj->deleteSelectedPosts($id);
  header('location: feedPage.php');
}
if (isset($_GET['label'])) {
  $id = $_GET['label'];
  $content = $testObj->getFilteredPosts($id);
}
if (isset($_GET['all'])) {
  $id = $_GET['all'];
  $content = $testObj->getPublishedPosts();
}
if (isset($_GET['likes'])) {
  $id = $_GET['likes'];
  $content = $testObj->updateLikes($id, 1);
}
if (isset($_GET['dislikes'])) {
  $id = $_GET['dislikes'];
  $content = $testObj->updateLikes($id, -1);
}
if (isset($_GET['search'])) {
  $str = $_GET['search'];
  $content = $testObj->searchPosts($str);
}

?>

<html>

<body class="light-theme" id="data-div">
  <div class="a-row">
    <div class="a-left">
      <div class="a-new-post">
        <input type="text" placeholder="Create post" id="myBtn">
      </div>
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <center>
            <h2>Create a new post..</h2>
            <form action="../formHandlers/createPost.php" class='createPost' target="_self" enctype="multipart/form-data" method="POST"> <br>
              <input type="text" name="title" required class="title" placeholder="Title"><br>
              <textarea rows="4" cols="50" name="description" class="desc" placeholder="Share your ideas, work with friends, change the world!"></textarea><br>
              <select name="label"><br>
                <?php foreach ($labels as $label) : ?>
                  <option value="<?php echo $label['Id'] ?>"> <?php echo $label['Name'] ?></option>
                <?php endforeach ?>
              </select><br>
              <input type="file" name="image"><br>
              <button type="submit" class="a-button-style">Create post</button>
            </form>
          </center>
        </div>
      </div>

      <div class="a-filter">
        <?php echo '<a class = "all" onclick=" filterPosts(``) ">All</a>'; ?>
        <?php foreach ($labels as $label) : ?>
          <?php echo '<a onclick=" filterPosts(`' . $label['Id'] . '`) ">' . $label['Name'] . '</a>'; ?>
        <?php endforeach ?>
      </div>

      <?php foreach ($content as $post) : ?>
        <div class="a-card">
          <div class="postFunctions">
            <?php
            $user = $testObj3->getUsersId($post['User_id']);
            if ((strval($user["Email"]) == $_SESSION["email"]) || $_SESSION['type'] == "ADMIN") {
              echo '<a href="editPost.php?id=' . $post['Id'] . '"><i class="fa fa-edit fa-2x"></i></a>';
              echo '<a onclick="deletePosts(' . $post['Id'] . ')"><i class="fa fa-times fa-2x"></i></a>';
            } ?>
          </div>
          <h2><?php echo $post['Title'] ?></h2>
          <h5><?php echo $post['Created_Date'] ?> in <?php $glb = $getLabel->getLabelById($post['Label']); echo strval($glb['Name']); ?></h5>
          <h5>by <?php
                  echo $user["Name"] ?></h5>
          <h3>
            <?php echo $post['Views'] ?> <i class="fa fa-eye"></i>
          </h3>
          <?php if ($post['Image'])
            echo '<img class = "post-image" src = "data:image/png;base64,' . base64_encode($post['Image']) . '" />'; ?>
          <br>
          <?php echo $post['Description'] ?>
          <br><br>
          <?php echo '<p><a href="viewPost.php?id=' . $post['Id'] . '">Read More</a></p>'; ?>
        </div>
      <?php endforeach ?>
    </div>
    <!--<div class="a-right">
      <div class="a-card">
        <input type="date" placeholder="From Date" id ="from" name ="from"/>
        <input type="date" placeholder="To Date" id ="to" name ="to"/>
        <?php echo '<a onclick=" filterPostsByDate(`' . $_POST['to'] . '`,`' . $_POST['from'] . '`) ">Go</a>'; ?>
      </div>
    </div> -->
  </div>
  <script src="../js/scripts.js"></script>
</body>

</html>