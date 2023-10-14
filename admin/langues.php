<?php
    session_start();

    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
    require "../connexion.php";

    if(isset($_GET['delete']))
    {
        $id = htmlspecialchars($_GET['delete']);
        $search = $bdd->prepare("SELECT * FROM langages WHERE id=?");
        $search->execute([$id]);
        if(!$donSearch = $search->fetch())
        {
            $search->closeCursor();
            header("LOCATION:langues.php");
        }
        $search->closeCursor();
        unlink("../images/upload/logo/".$donSearch['logo']);
        $delete = $bdd->prepare("DELETE FROM langages WHERE id=?");
        $delete->execute([$id]);
        $delete->closeCursor();
        header("LOCATION:langues.php?deletesuccess=".$id);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Administration - Language</title>
</head>
<body>
    <div class="container">
        <h2>Gestion des langages</h2>
        <a href="addLangage.php" class="btn btn-primary my-3">Ajouter un langage</a>
        <a href="dashboard.php" class="btn btn-secondary m-3">Retour</a>
        <?php
            if(isset($_GET['addsuccess']))
            {
                echo "<div class='alert alert-success'>Vous avez bien ajouté un langage</div>";
            }
            if(isset($_GET['update']))
            {
                echo "<div class='alert alert-warning'>Le langage n°".$_GET['update']." a bien été mis à jour</div>";
            }
            if(isset($_GET['deletesuccess']))
            {
                echo "<div class='alert alert-danger'>Le langage n°".$_GET['deletesuccess']." a bien été supprimé</div>";
            }
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Langage</th>
                    <th>Logo</th>
                    <th>Pourcentage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $req = $bdd->query("SELECT * FROM langages");
                    while($don = $req->fetch())
                    {
                        echo "<tr>";
                            echo "<td>".$don['id']."</td>"; 
                            echo "<td>".$don['langage']."</td>"; 
                            echo "<td>".$don['logo']."</td>"; 
                            echo "<td>".$don['pourcentage']."</td>"; 
                            echo "<td>";
                            echo "<a href='updateLangage.php?id=".$don['id']."' class='btn btn-warning m-2'>Modifier</a>";
                                echo  "<a href='langues.php?delete=".$don['id']."' class='btn btn-danger'>Supprimer</a>";
                            echo "</td>"; 
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>