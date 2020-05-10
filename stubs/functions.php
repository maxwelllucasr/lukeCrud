<?php

function crudlog($string,$bool){
    if ($bool) $file = fopen("../log/debug.log", "a");
    else $file = fopen("log/debug.log", "a");
    fwrite($file,"\n".$string);
    fclose($file);
}

?>