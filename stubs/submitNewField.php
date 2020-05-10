<?php
require 'functions.php';
require 'mysqlCredentials.php';

if ((isset($_POST['name']) && (isset($_POST['type']))) && (isset($_POST['formId']))){
//do validation here

crudlog("here",true);

$link = mysqli_connect($hn,$us,$ps,$db);
$res = $link->prepare('INSERT INTO fields (name,type, form_id) VALUES (? , ? , ?)');
$res->bind_param('ssi',$name,$type,$formId);
$name = $_POST['name'];
$type = $_POST['type'];
$formId = $_POST['formId'];
$res->execute();
$res->close();
$link->close();
}