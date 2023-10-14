<?php
    session_start();

    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    if(isset($_POST['langage']))
    {
        $err = 0;
        if(empty($_POST['langage']))
        {
            $err = 1;
        }else{
            $langage = htmlspecialchars($_POST['langage']);
        }

        if(empty($_POST['pourcentage']))
        {
            $err = 2;
        }else{
            $pourcentage = htmlspecialchars($_POST['pourcentage']);
        }
        
        if($err == 0)
        {
            $dossier = '../images/upload/logo/';
            $fichier = basename($_FILES['logo']['name']);
            $taille_maxi = 200000;
            $taille = filesize($_FILES['logo']['tmp_name']);
            $extensions = array('.png','.gif','.jpg','.jpeg','.svg');
            $extension = strrchr($_FILES['logo']['name'], '.');

            if(!in_array($extension,$extensions))
            {
                $err = 3;
            }
            if($taille>$taille_maxi)
            {
                $err = 4;
            }

            if($err == 0)
            {
                $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                $fichiercpt = rand().$fichier;

                if(move_uploaded_file($_FILES['logo']['tmp_name'],$dossier.$fichiercpt))
                {
                    require "../connexion.php";
                    $insert = $bdd->prepare("INSERT INTO langages(langage,pourcentage,logo) VALUES(?,?,?)");
                    $insert->execute([$langage,$pourcentage,$fichiercpt]);
                    $insert->closeCursor();
                    header("LOCATION:langues.php?addsuccess=ok");
                }else{
                    header("LOCATION:addLangage.php?error=5"); 
                }
            }else{
                header("LOCATION:addLangage.php?error=".$err);
            }
        }else{
            header("LOCATION:addLangage.php?error=".$err);
        }
    }else{
        header("LOCATION:addLangage.php");
    }

?>