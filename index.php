<?php
require 'stubs/header.php';
?>
<h2>Front End</h2>

<?php 
$link = mysqli_connect($hn,$us,$ps,$db);
$rows = $link->query('SELECT * FROM forms WHERE is_active = 1');

foreach ($rows as $row){
    var_dump($row);
}
?>


<?php
require 'stubs/footer.php';
?>