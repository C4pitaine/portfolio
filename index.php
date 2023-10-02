<?php
    require "connexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/style.css">
    <title>Accueil - Portfolio</title>
</head>
<body>
    <?php 
        include("partials/header.php");
    ?>
    <div class="slide" id="home">
        <div class="pres">
            <div class="me">
                <h3 class="name">SACRÉ</h3>
                <h3 class="firstname">ALEXANDRE</h3>
                <h3 class="job">WEB DEVELOPER</h3>
            </div>
            <div class="socials">
            <a href="https://fr-fr.facebook.com/alexandre.sacre.5">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
            </a>
            <a href="https://www.linkedin.com/in/alexandre-sacr%C3%A9-222560194/">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
            </a>
            <a href="https://github.com/C4pitaine">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 496 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
            </a>
            <a href="mailto:sacre.alexandre@hotmail.com">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
            </a>
            </div>
        </div>
        <svg id="downArrow" fill="#ffffff" height="800px" width="800px" version="1.1" id="Layer_1"     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	    viewBox="0 0 330 330" xml:space="preserve">
        <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393
            c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393
            s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"/>
        </svg>
    </div>
    <div class="slide" id="pres">
        <div id="about">
            <div class="wrapper">
                <div class="about">
                    <h3>ABOUT ME</h3>
                    <div class="aboutMe">
                        <div class="information">
                            <div class="infoName">
                                <h4>Alexandre Sacré</h4>
                                <p>Web Developer</p>
                                <hr>
                            </div>
                            <div class="infos">
                                <div class="info">
                                    <img src="images/tags/location.png" alt="Tags Location">
                                    <p>Based in Gooik</p>
                                </div>
                                <div class="info">
                                    <img src="images/tags/school.png" alt="Tags School">
                                    <p>BES at EPSE</p>
                                </div>
                                <div class="info">
                                    <img src="images/tags/send.png" alt="Tags Send">
                                    <p>sacre.alexandre@hotmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="skills">
                            <div class="wrapper">
                                <h4>Current skills</h4>
                                <hr>
                                <?php   
                                    $req = $bdd->query("SELECT * FROM langages");
                                    while($don = $req->fetch())
                                    {
                                        echo "<div class='langues'>";
                                            echo "<img src='images/upload/logo/".$don['logo']."' alt='Image de ".$don['langage']."'>";
                                            echo "<div class='jauge'>";
                                                echo "<div class='pourcent' style='width:".$don['pourcentage']."%'></div>";
                                            echo "</div>";
                                        echo "</div>";
                                    }
                                    $req->closeCursor();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="projects">
            <div class="wrapper">
                <h3>MY LAST PROJECTS</h3>
                <a href="allProjects.php" id="seeAllP">
                    <div>Voir tout mes projets</div>
                </a>
            </div>
            <div class="projects">
                <div class="wrapper">
                    <?php
                        $limit=3;
                        $req = $bdd->prepare("SELECT * FROM websites ORDER BY id DESC LIMIT 0,:limit");
                        $req->bindParam(':limit', $limit, PDO::PARAM_INT);
                        $req->execute();
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
                                    echo "<a href='website-".$don['id']."' class='btn'>";
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
    </div>
    <div class="slide" id="contact">
        <div class="wrapper">
            <h3>CONTACT</h3>
            <div class="cadre">
                <div class="request">
                    <h5>Any request ?</h5>
                    <hr>
                    <?php
                        if(isset($_GET['sendFail']))
                        {
                            $error = htmlspecialchars($_GET['sendFail']);
                            echo "<div class='sendFail'>Send Fail (code erreur: ".$error.")</div>";
                        }
                        if(isset($_GET['sendSuccess']))
                        {
                            echo "<div class='sendSuccess'>Send Success</div>";
                        }
                    ?>
                    <form action="traitement.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Ex: Alex">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Ex: yourmail@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" placeholder="Type your request"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="SEND">
                        </div>
                    </form>
                </div>
                <div class="socials">
                    <div class="Rsocials">
                        <a href="https://fr-fr.facebook.com/alexandre.sacre.5">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
                        </a>
                        <p>@Sacré Alexandre</p>
                    </div>
                    <div class="Rsocials">
                        <a href="https://www.linkedin.com/in/alexandre-sacr%C3%A9-222560194/">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                        </a>
                        <p>@Sacré Alexandre</p>
                    </div>
                    <div class="Rsocials">
                        <a href="https://github.com/C4pitaine">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 496 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
                        </a>
                        <p>@C4pitaine</p>
                    </div>
                    <div class="Rsocials">
                        <a href="mailto:sacre.alexandre@hotmail.com">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                        </a>
                        <p>sacre.alexandre@hotmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="images/background/vagueContact" alt="Image de Fond" class="fond">
        <img src="images/background/Rectangle" alt="Image de Fond" class="rectangle">
    </div>
    <?php
        include "partials/footer.php";
    ?>
    <script src="portfolio.js"></script>
</body>
</html>