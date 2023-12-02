<?php

require_once("../classes/classes.php");

/*require_once 'template.php';
define('TEMPLATES_PATH', '../templates');
$template = new Template(TEMPLATES_PATH . '/menu.php');
$template->show();*/
require_once("../templates/menu.php");

?>

<html>

<body>
    <div class="a-row" id="contact">
        <div class="a-left-contact">
            <h2>Alexandra Ioan </h2>
            <p>contact@alexwritescode.eu</p>
            <h2>Jana Muradova </h2>
            <p>jana_muradova@outlook.com</p>
        </div>
        <div class="a-right-contact">
            <form action="../formHandlers/contactForm.php" method="POST">
                <label for="fname">First Name</label>
                <input type="text" id="name" name="name" placeholder="Your name..">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email..">
                <label for="subject">Message</label>
                <textarea id="message" name="message" placeholder="Send us any questions, tips or praise you might have!" style="height:170px"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

</body>
</html>