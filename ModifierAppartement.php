<?php
    ob_start();
    require_once "./Model/crudAppartement.php";
    require_once "./Model/Appartement.php";

    if(isset($_GET['ref'])) {
        $obj = new crudAppartement();
        $result = $obj->RecupererApp($_GET['ref']);
        $row = $result->fetch(PDO::FETCH_NUM);

        if(isset($_POST['Proprietaire']) && isset($_POST['Localite']) && isset($_POST['Surface']) && isset($_POST['DomaineUsage']) && isset($_POST['NbPieces']) && isset($_POST['SurfaceEspaceCommun'])) {
            var_dump($_POST);
            $appartement = new Appartement($_GET['ref'],$_POST['Proprietaire'],$_POST['Localite'],$_POST['Surface'],$_POST['NbPieces'],$_POST['DomaineUsage'],$_POST['SurfaceEspaceCommun']);

            $obj = new crudAppartement();

            $result = $obj->ModifierApp($appartement);
            if(!$result) {
                header("Location: http://localhost:3044/ListerAppartement.php?state=0");
            } else {
                header("Location: http://localhost:3044/ListerAppartement.php?state=1");
            }
        }
    }else {
        header("Location: http://localhost:3044/ListerAppartement.php?state=0");
    }
?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal col-md-8 col-md-offset-2">
    <div class="form-group">
        <label for="Proprietaire" class="col-md-4 control-label">Propriétaire</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="Proprietaire" name="Proprietaire" placeholder="Propriétaire de l'appartement" value="<?=$row[1]?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="Localite" class="col-md-4 control-label">Localité</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="Localite" name="Localite" placeholder="Localité de l'appartement" value="<?=$row[2]?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="Surface" class="col-md-4 control-label">Surface</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="Surface" name="Surface" placeholder="Surface de l'appartement" value="<?=$row[3]?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="DomaineUsage" class="col-md-4 control-label">Domaine d'usage</label>
        <div class="col-md-9">
            <select class="form-control" id="DomaineUsage" name="DomaineUsage" required>
                <?php if($row[5]=="bureau"){ ?>
                    <option value="Bureau" selected >Bureau</option>
                    <option value="domicile">Domicile</option>
                <?php }else{ ?>
                    <option value="Bureau">Bureau</option>
                    <option value="domicile" selected>Domicile</option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="NbPieces" class="col-md-4 control-label">Nombre de pièces</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="NbPieces" name="NbPieces" placeholder="Nombre de pièces de l'appartement" value="<?=$row[4]?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="SurfaceEspaceCommun" class="col-md-4 control-label">Surface des espaces communs</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="SurfaceEspaceCommun" name="SurfaceEspaceCommun" placeholder="Surface des espaces communs de l'appartement" value="<?=$row[6]?>" required>
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-3">Modifier</button>
</form>

<?php
    $content = ob_get_clean();
    include "layout.php";
?>