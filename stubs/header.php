<?php
session_start();
//CRUD Header
require 'functions.php';
require 'mysqlCredentials.php';

$_SESSION['userid'] = 1;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/functions.js"></script>

<h1>
Luke Crud
</h1>

<nav>
    <a href="/lukeCrud/admin.php">Admin</a>
    <a href="/lukeCrud/index.php">Home</a>
</nav>