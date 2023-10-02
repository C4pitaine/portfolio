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

        $search = $bdd->prepare("SELECT * FROM websites WHERE id=?");
        $search->execute([$id]);
        if(!$donSearch = $search->fetch())
        {
            $search->closeCursor();
            header("LOCATION:websites.php");
        }
        $search->closeCursor();

        unlink("../images/upload/website/".$donSearch['image']);
        $delete = $bdd->prepare("DELETE FROM websites WHERE id=?");
        $delete->execute([$id]);
        $delete->closeCursor();
        header("LOCATION:websites.php?deletesuccess=".$id);

    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Administration - Website</title>
</head>
<body>
    <div class="container">
        <h2>Gestion des sites Web</h2>
        <a href="addWebsite.php" class="btn btn-primary my-3">Ajouter un site Web</a>
        <a href="dashboard.php" class="btn btn-secondary m-3">Retour</a>
        <?php
            if(isset($_GET['addsuccess']))
            {
                echo "<div class='alert alert-success'>Vous avez bien ajouté un site à la base de donnée</div>";
            }
            if(isset($_GET['update']))
            {
                echo "<div class='alert alert-warning'>Le Site Web n°".$_GET['update']." a bien été mis à jour</div>";
            }
            if(isset($_GET['deletesuccess']))
            {
                echo "<div class='alert alert-danger'>Le Site Web n°".$_GET['deletesuccess']." a bien été supprimé</div>";
            }
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Url</th>
                    <th>Github</th>
                    <th>Figma</th>
                    <th>Categorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    $req = $bdd->query("SELECT * FROM websites");
                    while($don = $req->fetch())
                    {
                        echo "<tr>";
                            echo "<td>".$don['id']."</td>";
                            echo "<td>".$don['name']."</td>";
                            echo "<td>".$don['date']."</td>";
                            echo "<td>".$don['description']."</td>";
                            echo "<td>".$don['image']."</td>";
                            echo "<td>".$don['url']."</td>";
                            echo "<td>".$don['github']."</td>";
                            echo "<td>".$don['figma']."</td>";
                            echo "<td>".$don['categorie']."</td>";
                            echo "<td>";
                                echo "<a href='updateWebsite.php?id=".$don['id']."' class='btn btn-warning m-2'>Modifier</a>";
                                echo "<a href='websites.php?delete=".$don['id']."' class='btn btn-danger m-2'>Supprimer</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    $req->closeCursor();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>