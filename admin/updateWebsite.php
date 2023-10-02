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
    $req = $bdd->prepare("SELECT * FROM websites WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:index.php");
    }
    $req->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Administration - Modifier un Site Web</title>
</head>
<body>
    <div class="container">
        <h2>Modifier un Site Web</h2>
        <?php
            if(isset($_GET['error']))
            {
                echo "<div class='alert alert-danger'>Veuillez remplir le formulaire correctement</div>";
            }
        ?>
        <form action="treatmentUpdateWebsite.php?id=<?=$don['id']?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$don['id']?>">
            <div class="form-group my-3">
                <label for="name">Nom: </label>
                <input type="text" name="name" id="name" value="<?=$don['name']?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="date">Date: </label>
                <input type="number" name="date" id="date" step="1" value="<?=$don['date']?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="description">Description: </label>
                <input type="text" name="description" id="description" value="<?=$don['description']?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="image">Image: </label>
                <div class="row">
                    <div class="col-4">
                        <img src="../images/upload/website/<?=$don['image']?>" alt="image de <?=$don['name']?>" style="width:100%">
                    </div>
                </div>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group my-3">    
                <label for="url">Url: </label>
                <input type="text" name="url" id="url" value="<?=$don['url']?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="github">Github: </label>
                <input type="text" name="github" id="github" value="<?=$don['github']?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="figma">Figma: </label>
                <input type="text" name="figma" id="figma" value="<?=$don['figma']?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="categorie">Categorie: </label>
                <select name="categorie" id="categorie">
                <?php
                    if($don['categorie'] == "Statique")
                    {
                        echo "<option value='Statique' selected>Statique</option>";
                        echo "<option value='Dynamique'>Dynamique</option>";
                    }else{
                        echo "<option value='Dynamique' selected>Dynamique</option>";
                        echo "<option value='Statique'>Statique</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Modifier" class="btn btn-warning my-2">
            </div>
        </form>
    </div>
</body>
</html>