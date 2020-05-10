<?php
require 'functions.php';
require 'mysqlCredentials.php';

if ((isset($_POST['name']) && (isset($_POST['type']))) && (isset($_POST['formId']))){
//do validation here

crudlog("here".$_POST['options'],true);

$link = mysqli_connect($hn,$us,$ps,$db);
$res = $link->prepare('INSERT INTO fields (name,type,form_id,options) VALUES (? , ? , ?, ?)');
$res->bind_param('ssis',$name,$type,$formId,$options);
$name = $_POST['name'];
$type = $_POST['type'];
$formId = $_POST['formId'];
if (isset($_POST['options'])) {$options = $_POST['options'];} //dropdown only
else {$options = null;}
$res->execute();
$res->close();
$link->close();
}