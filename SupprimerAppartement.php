<?php 
    require_once "./Model/crudAppartement.php";
    require_once "./Model/Appartement.php";

    if(isset($_GET['ref'])) {
        $obj = new crudAppartement();
        $result = $obj->SupprimerApp($_GET['ref']);
        if(!$result) {
            header("Location: http://localhost:3044/ListerAppartement.php?state=2");
        } else {
            header("Location: http://localhost:3044/ListerAppartement.php?state=3");
        }
    }
?>