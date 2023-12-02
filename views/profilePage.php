<?php
require_once("../classes/classes.php");

/*require_once('template.php');
define('TEMPLATES_PATH', '../templates');
$menu = new Template(TEMPLATES_PATH . '/menu.php');*/
require_once("../templates/menu.php");
$getLabel = new LabelDB();

$testObj = new ContentDB();
$testObj3 = new UserDB();

$content = $testObj->getUserPublishedPosts($testObj3->getUsersStmt($_SESSION["email"]));

if (isset($_GET['user'])) {
    $content = $testObj->getUserPublishedPosts($_GET['user']);
}

$testObj2 = new LabelDB();
$labels = $testObj2->getLabels(); 
$logged = $testObj3 ->getUsersEmail($_SESSION["email"]);
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="light-theme">
    <div class="a-row">
        <div class="a-left">
            <div class="y-Personal_Info">
                <!--Current info here-->
                <div class="current_Info">
                <form method="POST" action="../formHandlers/editDetails.php" class='createPost' target="_self" enctype="multipart/form-data"> <br>
                    <input type="name" name = "name" placeholder="Name" value = "<?php echo $logged['Name']?>" /> <br>
                    <input type="email" name="email" placeholder="Email" value = "<?php echo $logged['Email']?>" /> <br>
                    <input type="password" name="password" placeholder="Password" value = "<?php echo $logged['Password']?>" />
                    <input type="text" name = "id" placeholder="Password" hidden value = "<?php echo $logged['Id']?>" />
                    <input type="file" name="image"><br>

                    <button class ="btn" type = "submit"><i class="fa fa-cog"></i> Edit personal info</button><br>

                    <!--Edit button & Profile picture-->
                    </form>
                </div>
                <?php if ($logged['Image'])
            echo '<img class = "post-image" src = "data:image/png;base64,' . base64_encode($logged['Image']) . '" />'; ?>
            </div>
            <?php foreach ($content as $post) : ?>
                <div class="a-card">
                    <div class="postFunctions">
                        <?php
                        $user = $testObj3->getUsersId($post['User_id']);
                        if ((strval($user["Email"]) == $_SESSION["email"]) || $_SESSION['type'] == "ADMIN") {
                            echo '<a href="editPost.php?id=' . $post['Id'] . '"><i class="fa fa-edit fa-2x"></i></a>';
                            echo '<a href="feedPage.php?del=' . $post['Id'] . '"><i class="fa fa-times fa-2x"></i></a>';
                        } ?>
                    </div>
                    <h2><?php echo $post['Title'] ?></h2>
                    <h5><?php echo $post['Created_Date'] ?> in <?php $getLabel = $getLabel->getLabelById($post['Label']); echo $getLabel['Name']; ?></h5>
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
        <script src="../js/scripts.js"></script>

</body>

</html>