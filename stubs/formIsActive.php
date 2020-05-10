<?php
require 'functions.php';
require 'mysqlCredentials.php';

if(isset($_POST['is_active']) && (isset($_POST['form']))){
    $link = mysqli_connect($hn,$us,$ps,$db);
    $res = $link->prepare("UPDATE forms SET is_active = ? WHERE id = ?");
    $res->bind_param('ii',$_POST['is_active'],$_POST['form']);
    $res->execute();
}