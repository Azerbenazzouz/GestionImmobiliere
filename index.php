<?php
    ob_start();
    echo "<h1> welcome </h1>";
    $content = ob_get_clean();
    include "layout.php";
?>