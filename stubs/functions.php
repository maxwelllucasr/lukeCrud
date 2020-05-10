<?php

function crudlog($string){
    $file = fopen("../log/debug.log", "a");
    fwrite($file,"\n".$string);
    fclose($file);
}

?>