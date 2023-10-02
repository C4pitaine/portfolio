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
    <title>Administration - Ajout Website</title>
</head>
<body>
    <div class="container">
        <h2>Ajouter un Site Web</h2>
        <?php
            if(isset($_GET['error']))
            {
                echo "<div class='alert alert-danger'>Veuillez remplir le formulaire correctement</div>";
            }
        ?>
        <form action="treatmentAddWebsite.php" method="POST" enctype="multipart/form-data">
            <div class="form-group my-3">
                <label for="name">Nom: </label>
                <input type="text" name="name" id="name" value="" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="date">Date: </label>
                <input type="number" name="date" id="date" step="1" value="" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="description">Description: </label>
                <input type="text" name="description" id="description" value="" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="image">Image: </label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group my-3">    
                <label for="url">Url: </label>
                <input type="text" name="url" id="url" value="" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="github">Github: </label>
                <input type="text" name="github" id="github" value="" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="figma">Figma: </label>
                <input type="text" name="figma" id="figma" value="" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="categorie">Categorie: </label>
                <select name="categorie" id="categorie">
                    <option value="statique">Statique</option>
                    <option value="dynamique">Dynamique</option>
                </select>
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Ajouter" class="btn btn-success">
            </div>
        </form>
    </div>
</body>
</html>