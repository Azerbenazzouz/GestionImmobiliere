<?php 
    ob_start();
    require_once "./Model/crudAppartement.php";
    require_once "./Model/Appartement.php";
    if(isset($_POST['Reference']) && isset($_POST['Proprietaire']) && isset($_POST['Localite']) && isset($_POST['Surface']) && isset($_POST['DomaineUsage']) && isset($_POST['NbPieces']) && isset($_POST['SurfaceEspaceCommun'])) {
        // $Reference = $_POST['Reference'];
        // $Proprietaire = $_POST['Proprietaire'];
        // $Localite = $_POST['Localite'];
        // $Surface = $_POST['Surface'];
        // $DomaineUsage = $_POST['DomaineUsage'];
        // $NbPieces = $_POST['NbPieces'];
        // $SurfaceEspaceCommun = $_POST['SurfaceEspaceCommun'];

        $appartement = new Appartement($_POST['Reference'],$_POST['Proprietaire'],$_POST['Localite'],$_POST['Surface'],$_POST['NbPieces'],$_POST['DomaineUsage'],$_POST['SurfaceEspaceCommun']);

        $obj = new crudAppartement();

        $result = $obj->AjouteApp($appartement);
        echo var_dump($result);
        if(!$result) {
            echo "<div class='alert alert-danger'>L'appartement n'a pas pu être ajouté</div>";
        } else {
            echo "<div class='alert alert-success'>Insertion effectuée avec succés
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                </div>";
        }
    }else{ 
?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal col-md-8 col-md-offset-2">
    <div class="form-group">
        <label for="Reference" class="col-md-4 control-label">Référence</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="Reference" name="Reference" placeholder="Référence de l'appartement">
        </div>
    </div>
    <div class="form-group">
        <label for="Proprietaire" class="col-md-4 control-label">Propriétaire</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="Proprietaire" name="Proprietaire" placeholder="Propriétaire de l'appartement">
        </div>
    </div>
    <div class="form-group">
        <label for="Localite" class="col-md-4 control-label">Localité</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="Localite" name="Localite" placeholder="Localité de l'appartement">
        </div>
    </div>
    <div class="form-group">
        <label for="Surface" class="col-md-4 control-label">Surface</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="Surface" name="Surface" placeholder="Surface de l'appartement">
        </div>
    </div>
    <div class="form-group">
        <label for="DomaineUsage" class="col-md-4 control-label">Domaine d'usage</label>
        <div class="col-md-9">
            <select class="form-control" id="DomaineUsage" name="DomaineUsage">
                <option value="Bureau">Bureau</option>
                <option value="Commerce">Domicile</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="NbPieces" class="col-md-4 control-label">Nombre de pièces</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="NbPieces" name="NbPieces" placeholder="Nombre de pièces de l'appartement">
        </div>
    </div>
    <div class="form-group">
        <label for="SurfaceEspaceCommun" class="col-md-4 control-label">Surface des espaces communs</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="SurfaceEspaceCommun" name="SurfaceEspaceCommun" placeholder="Surface des espaces communs de l'appartement">
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-3">Ajouter</button>
</form>
<?php
    }
    $content = ob_get_clean();
    include "layout.php";

?>