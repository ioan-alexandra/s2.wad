<?php
require_once("../classes/classes.php");

require_once("../templates/menu.php");

$labelObj = new LabelDB();
$label = $labelObj->getLabel($_GET['id']);

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $labels = $labelObj->deleteSelectedLabels($id);
    header('location: adminLabelsView.php');
}
?>

<html>

<body class="light-theme" id="data-div">
    <div class="a-row">
        <div class="a-left">
            <form action="../formHandlers/editLabel.php" class='createPost' target="_self" enctype="multipart/form-data" method="POST"> <br>
            <input type="text" hidden name="id" class="id" placeholder="<?php echo $label['Id'] ?>" value="<?php echo $label['Id']; ?>"><br>
            <input type="text" name="name" required class="name" placeholder="<?php echo $label['Name'] ?>" value="<?php echo $label['Name']; ?>"><br>
                <button type="submit" class="a-button-style">Update label</button>
            </form>
            <script src="../js/scripts.js"></script>
        </div>
    </div>
</body>

</html>