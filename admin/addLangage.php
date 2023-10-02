<?php
    session_start();

    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Ajout - Languages</title>
</head>
<body>
    <div class="container">
        <h2>Ajouter un langage</h2>
        <?php
            if(isset($_GET['error']))
            {
                echo "<div class='alert alert-danger'>Veuillez remplir le formulaire correctement</div>";
            }
        ?>
        <form action="treatmentAddLangage.php" method="POST" enctype="multipart/form-data">
            <div class="form-group my-3">
                <label for="langage">Langage: </label>
                <input type="text" name="langage" id="langage" value="" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="logo">Logo: </label>
                <input type="file" name="logo" id="logo" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="pourcentage">Pourcentage: </label>
                <input type="number" step="1" min="0" max="100" name="pourcentage" id="pourcentage" class="form-control">
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Ajouter" class="btn btn-success">
            </div>
        </form>
    </div>
</body>
</html>