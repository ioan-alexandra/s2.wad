<?php
require_once("../classes/classes.php");

require_once("../templates/menu.php");
$contentObj = new ContentDB();

$labelObj = new LabelDB();
$labels = $labelObj->getLabels();

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $contentObj = $contentObj->getFilteredPosts($id);
    if (sizeof($contentObj) == 0) {
        $labels = $labelObj->deleteSelectedLabels($id);
        header('location: adminLabelsView.php');
    }
}
?>

<html>

<body class="light-theme" id="data-div">
    <div class="a-row">
        <div class="a-left">
            <div class="a-new-post">
                <input type="text" placeholder="Create label" id="myBtn">
            </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <center>
                        <h2>Create a new label..</h2>
                        <form action="../formHandlers/createLabel.php" class='createPost' target="_self" enctype="multipart/form-data" method="POST"> <br>
                            <input type="text" name="name" required class="name" placeholder="Name"><br>
                            <button type="submit" class="a-button-style">Create label</button>
                        </form>
                    </center>
                </div>
            </div>

            <?php foreach ($labels as $label) : ?>
                <div class="a-card">
                    <div class="postFunctions">
                        <?php
                        echo '<a href="editLabel.php?id=' . $label['Name'] . '"><i class="fa fa-edit fa-2x"></i></a>';
                        echo '<a href="adminLabelsView.php?del=' . $label['Id'] . '"><i class="fa fa-times fa-2x"></i></a>';
                        ?>

                    </div>
                    <h3><?php echo $label['Name']; ?></h3>
                    <?php echo '<p><a onclick=" filterPosts(`' . $label['Name'] . '`) ">View posts</a></p>'; ?>

                </div>
            <?php endforeach ?>
            <script src="../js/scripts.js"></script>
        </div>
    </div>
</body>

</html>