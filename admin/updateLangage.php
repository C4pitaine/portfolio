<?php
    session_start();

    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET['id']);
    }else{
        header("LOCATION:index.php");
    }

    require "../connexion.php";
    $req = $bdd->prepare("SELECT * FROM langages WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:langues.php");
    }
    $req->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Modifier - Langage</title>
</head>
<body class="bg-secondary">
    <div class="container">
        <h2>Modifier un produit</h2>
        <?php
            if(isset($_GET['error']))
            {
                echo "<div class='alert alert-danger'>Veuillez remplir le formulaire correctement</div>";
            }
        ?>
        <form action="treatmentUpdateLangage.php?id=<?= $don['id']?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $don['id'] ?>" >
            <div class="form-group my-3">
                <label for="langage">Langage: </label>
                <input type="text" name="langage" id="langage" value="<?= $don['langage']?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="pourcentage">Pourcentage: </label>
                <input type="number" step="1" min="0" max="100" name="pourcentage" id="pourcentage" value="<?= $don['pourcentage']?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="logo">Logo: </label>
                <div class="row">
                    <div class="col-4">
                        <img src="../images/upload/logo/<?= $don['logo']?>" class="img-fluid" alt="Image de <?= $don['langage']?>">
                    </div>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Modifier" class="btn btn-warning">
            </div>
        </form>
    </div>
</body>
</html>