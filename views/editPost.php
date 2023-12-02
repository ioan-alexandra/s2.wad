<?php

require_once("../classes/classes.php");

require_once("../templates/menu.php");

$testObj = new ContentDB();
$content = $testObj->getSelectedPosts($_GET['id']);
$testObj2 = new LabelDB();
$labels = $testObj2->getLabels();
?>

<html>

<head></head>

<body class="light-theme">
    <div class="a-row">
        <div class="a-left">
            <div class="a-card">
                <form method="POST" target="_self" action="../formHandlers/editPost.php" class='createPost' target="_self" enctype="multipart/form-data" method="POST"> <br>
                    <input type="text" name="title" required class="title" placeholder="<?php echo $content['Title'] ?>" value="<?php echo $content['Title'] ?>"><br>
                    <textarea rows="4" cols="50" name="description" class="desc"><?php echo $content['Description'] ?></textarea><br>
                    <select name="label" value="<?php $content['Label'] ?> "><br>
                        <?php foreach ($labels as $label) :
                            if ($label['Name'] == $content['Label'])
                                echo "<option selected> " . $label['Name'] . "</option>";
                            else
                                echo "<option>" . $label['Name'] . " </option>";
                        ?>
                        <?php endforeach ?>
                    </select><br>
                    <input hidden type="text" name="id" class="id" placeholder="<?php echo $content['Id'] ?>" value="<?php echo $content['Id'] ?>"><br>
                    <input type="file" name="image"><br>

                    <?php if ($content['Image'])
                        echo '<img class = "post-image" src = "data:image/png;base64,' . base64_encode($content['Image']) . '" />'; ?>
                    <button type="submit" class="a-button-style">Update post</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>