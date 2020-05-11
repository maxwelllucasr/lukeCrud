<?php
require 'functions.php';
require 'mysqlCredentials.php';

if(isset($_POST['is_active']) && (isset($_POST['form']))){
    crudlog($_POST['is_active'].$_POST['form'],true);
    $link = mysqli_connect($hn,$us,$ps,$db);
        if ($_POST['is_active'] == 'true') $bool = 1;
        else if ($_POST['is_active'] == 'false') $bool = 0;
        else die;
    $res = $link->prepare("UPDATE forms SET is_active = ? WHERE id = ?");
    $res->bind_param('ii',$bool,$_POST['form']);
    $res->execute();
}