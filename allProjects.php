<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "partials/meta.php";
    ?>
    <link rel="stylesheet" href="build/style.css">
    <title>Portfolio - All Projects</title>
</head>
<body>
    <?php include "partials/header.php"; ?>
    <div class="slide" id="allProjects">
        <div class="wrapper">
            <h3>MY PROJECTS</h3>
            <a href="index.php#projects" class="back">
                <div>Back</div>
            </a>
            <div class="showAll">
            <?php
                require "connexion.php";
                
                $req = $bdd->query("SELECT * FROM websites ORDER BY id DESC ");
                while($don = $req->fetch())
                {
                    $description = strip_tags($don['description']);
                    if(preg_match('#(\w+\W+){14}\w+#s',$description,$out))
                    {
                        $html = "<div class='text'>".$out[0]."...</div>";
                    }else{
                        $html = "<div class='text'>".$description."</div>";
                    }
                    echo "<div class='card'>";
                        echo "<div class='wrapper'>";
                            echo "<h5>".$don['name']."</h5>";
                            echo "<hr>";
                            echo $html;
                            echo "<img src='images/upload/website/".$don['image']."' alt='Image de ".$don['name']."'>";
                            echo "<a href='Website-".$don['id']."' class='btn'>";
                                echo "<div>VIEW MORE</div>";
                            echo "</a>";
                            
                        echo "</div>";
                    echo "</div>";
                }
                $req->closeCursor(); 
            ?>
            </div>
        </div>
    </div>
    <script src="portfolio.js"></script>
</body>
</html>