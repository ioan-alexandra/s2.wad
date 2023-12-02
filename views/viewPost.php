<?php

require_once("../classes/classes.php");

/*require_once 'template.php';
define('TEMPLATES_PATH', '../templates');
$template = new Template(TEMPLATES_PATH . '/menu.php');
$template->show();*/
require_once("../templates/menu.php");

$testObj = new ContentDB();
$content = $testObj->updateViews($_GET['id']);
$content = $testObj->getSelectedPosts($_GET['id']);
$getLabel = new LabelDB();

if (isset($_GET['likes'])) {
    $id = $_GET['likes'];
    $content = $testObj->updateLikes($id, 1);
}
if (isset($_GET['dislikes'])) {
    $id = $_GET['dislikes'];
    $content = $testObj->updateLikes($id, -1);
}
?>

<html>

<head></head>

<body class="light-theme">
    <div class="a-row">
        <div class="a-left">
            <div class="a-card">

                <h2><?php echo $content['Title'] ?></h2>
                <h5><?php echo $content['Created_Date'] ?> in <?php $getLabel = $getLabel->getLabelById($content['Label']); echo $getLabel['Name']; ?></h5>
                <h3>
                    <?php echo $content['Views'] ?> <i class="fa fa-eye"></i>
                </h3>
                <?php if ($content['Image'])
                        echo '<img class = "post-image" src = "data:image/png;base64,' . base64_encode($content['Image']) . '" />'; ?>
                    <br>
                <?php echo $content['Description'] ?>
            </div>
        </div>
    </div>
</body>

</html>