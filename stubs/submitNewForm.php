<?php
require 'functions.php';

if (isset($_POST['name'])) crudlog($_POST['name']);



//dont forget to do validation here, this is where it counts



//Metadata - these are global 

//User table

//User ID - auto, unique, primary
//username - unique

//Form table info:

//Form Id - autonumber, unique, primary
//Form name - unique, editable in admin
//Form owner - relational, visible in admin
//Form date created - easy, datetime, visible in admin
//Form updated at - easy, datetime, visible in admin

//Form table field info

//Field Id - autonumber, unique, primary, visible in admin
//Form Id - foreign, visible in admin
//Field type - string, editable in admin
//Field name - unique to its form

//Data table:

//Form ID - foreign
//User ID - foreign
//Data ID - Primary
//Field JSON - variable length of columns in this field means that we need a column for JSON


?>