<?php
require 'stubs/header.php';

if (($_SESSION['userid']) && ($_SESSION['isadmin'])) {
?>

<h2>Admin</h2>

<div class="message"></div>

    <?php require 'sections/submitFormFrontEnd.php'; ?>
    <?php require 'sections/usersForms.php'; ?>

   
<?php
}
else echo "Access denied";

require 'stubs/footer.php';
?>