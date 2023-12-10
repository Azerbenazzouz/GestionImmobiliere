<?php 
    ob_start();
    require_once "./Model/crudAppartement.php";
    require_once "./Model/Appartement.php";

    $obj = new crudAppartement();
    $result = $obj->ListerApp();
    // echo var_dump($result->fetch(PDO::FETCH_NUM));
    $state = $_GET['state'] ?? 404;
    switch ($state) {
        case 0:
            echo "<div class='alert alert-danger'>L'appartement n'a pas pu être modifié</div>";
            break;
        case 1:
            echo "<div class='alert alert-success'>Modification effectuée avec succés</div>";
            break;
        case 2:
            echo "<div class='alert alert-danger'>L'appartement n'a pas pu être supprimé</div>";
            break;
        case 3:
            echo "<div class='alert alert-success'>Suppression effectuée avec succés</div>";
            break;
        default:
            break;
    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des appartements</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Propriétaire</th>
                        <th>Localité</th>
                        <th>Surface</th>
                        <th>Nombre de pièces</th>
                        <th>Domaine d'usage</th>
                        <th>Surface espace commun</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch(PDO::FETCH_NUM)) { ?>
                    <tr>
                        <td><?=$row[0]?></td>
                        <td><?=$row[1]?></td>
                        <td><?=$row[2]?></td>
                        <td><?=$row[3]?></td>
                        <td><?=$row[4]?></td>
                        <td><?=$row[5]?></td>
                        <td><?=$row[6]?></td>
                        <td>
                            <a href="http://localhost:3044/ModifierAppartement.php?ref=<?=$row[0]?>" class="btn btn-info">Modifier</a>
                            <a href="http://localhost:3044/SupprimerAppartement.php?ref=<?=$row[0]?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="http://localhost:3044/AjoutAppartement1.php" class="btn btn-primary">Ajouter un appartement</a>
        </div>
    </div>
</div>

<?php 
    $content = ob_get_clean();
    include "layout.php";
?>