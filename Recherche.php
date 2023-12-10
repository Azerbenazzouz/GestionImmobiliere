<?php
    ob_start();
    require_once "./Model/crudAppartement.php";
    require_once "./Model/Appartement.php";
    if(isset($_GET['Referance'])) {
        $obj = new crudAppartement();
        $result = $obj->RecupererApp($_GET['Referance']);
        $row = $result->fetch(PDO::FETCH_NUM);
        if(!$row){
            echo "<h1>Appartement non trouvé</h1>";
        }else{
?>
<h1>Appartement trouvé :</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Reference</th>
            <th>Proprietaire</th>
            <th>Localite</th>
            <th>Surface</th>
            <th>Nombre de pieces</th>
            <th>Domaine d'usage</th>
            <th>Surface espace commun</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?=$row[0]?></td>
            <td><?=$row[1]?></td>
            <td><?=$row[2]?></td>
            <td><?=$row[3]?></td>
            <td><?=$row[4]?></td>
            <td><?=$row[5]?></td>
            <td><?=$row[6]?></td>
        </tr>
    </tbody>

<?php
        }
    }else{
?>

<form action="<?=$_SERVER['PHP_SELF']?>">
    <div class="form-group">
        <label for="Referance" class="col-md-4 control-label">Referance</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="Referance" name="Referance" placeholder="Referance de l'appartement"" required>
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
</form>

<?php
        };
    $content = ob_get_clean();
    include "layout.php";
?>