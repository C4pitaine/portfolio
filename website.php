<?php
    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET['id']);
    }else{
        header("LOCATION:index.php");
    }

    require "connexion.php";
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
    <link rel="stylesheet" href="build/style.css">
    <title>Website <?=$don['name']?></title>
</head>
<body>
<?php include "partials/header.php"; ?>
<div class="slide" id="website">
    <div class="wrapper">
        <div class="about">
            <?php
                if(isset($_GET['back']))
                {
                    if($_GET['back'] == "I")
                    {
                        echo "<a href='index.php#projects' class='back'>";
                            echo "<div>Back</div>";
                        echo "</a>";
                    }
                    if($_GET['back'] == "P")
                    {
                        echo "<a href='allProjects.php' class='back'>";
                            echo "<div>Back</div>";
                        echo "</a>";
                    }
                }else{
                    echo "<a href='index.php' class='back'>";
                        echo "<div>Back</div>";
                    echo "</a>";
                }
            ?>
            <div class="aboutMe">
                <div class="information">
                    <div class="infoName">
                        <h4><?=$don['name']?></h4>
                        <p><?=$don['date']?></p>
                        <hr>
                    </div>
                    <div class="infos">
                        <div class="info">
                            <img src="images/upload/logo/url.png" alt="Logo Url">
                            <a href="<?=$don['url']?>">Url</a>
                        </div>
                        <div class="info">
                            <img src="images/upload/logo/figma.png" alt="Logo Figma">
                            <a href="<?=$don['figma']?>">Figma</a>
                        </div>
                        <div class="info">
                            <img src="images/upload/logo/github.png" alt="Logo Github">
                            <a href="<?=$don['github']?>">Github</a>
                        </div>
                    </div>
                </div>
                <div class="skills">
                    <div class="wrapper">
                        <img src="images/upload/website/<?=$don['image']?>" alt="Image de <?=$don['name']?>">
                        <div class="text">
                            <?=$don['description']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="portfolio.js"></script>
</body>
</html>