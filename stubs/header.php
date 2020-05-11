<?php
session_start();
// session_unset();
//CRUD Header
require 'functions.php';
require 'mysqlCredentials.php';

// $_SESSION['userid'] = 1;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/functions.js"></script>

<h1>
Luke Crud
</h1>

<?php if (isset($_SESSION['username'])) { ?><form action="login.php" method="post"><input type="submit" name="logout" value="Logout"></form> <?php } ?>

<?php 

if (isset($_POST['logout'])) session_unset();

if (isset($_SESSION['username'])) { ?><h3>Welcome <?=$_SESSION['username']?></h3><?php } ?>

<nav>
<?php if ($_SESSION['isadmin']) { ?><a href="/lukeCrud/admin.php">Admin</a><?php } ?>
    <a href="/lukeCrud/index.php">Home</a>
    <?php if (!$_SESSION['userid']) { ?> <a href="/lukeCrud/login.php">Login</a>
 <?php } ?>
</nav>