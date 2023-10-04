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
        header("LOCATION:contact.php");
    }

    require "../connexion.php";

    $req = $bdd->prepare("SELECT * FROM contact WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:contact.php");
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
    <title>Message <?=$don['id']?></title>
</head>
<body>
    <a href="contact.php" class='btn btn-success m-3'>Retour</a>
    <h3 class="my-3 mx-2">Message de <?=$don['name']?> <?=$don['firstname']?> le <?=$don['date']?></h3>
    <h4 class="my-3 mx-2">Adresse E-mail: <?=$don['email']?></h4>
    <div class="my-3 mx-2"><?=$don['message']?></div>
</body>
</html>