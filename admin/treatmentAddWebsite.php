<?php
    session_start();

    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    if(isset($_POST['name']))
    {
        $err = 0;
        if(empty($_POST['name']))
        {
            $err = 1;
        }else{
            $name = htmlspecialchars($_POST['name']);
        }
        if(empty($_POST['date']))
        {
            $err = 2;
        }else{
            $date = htmlspecialchars($_POST['date']);
        }
        if(empty($_POST['description']))
        {
            $err = 3;
        }else{
            $description = htmlspecialchars($_POST['description']);
        }
        
        if(empty($_POST['url']))
        {
            $err = 4;
        }else{
            $url = htmlspecialchars($_POST['url']);
        }

        if(empty($_POST['github']))
        {
            $err = 5;
        }else{
            $github = htmlspecialchars($_POST['github']);
        }

        if(empty($_POST['figma']))
        {
            $err = 6;
        }else{
            $figma = htmlspecialchars($_POST['figma']);
        }

        if(empty($_POST['categorie']))
        {
            $err = 7;
        }else{
            $categorie = htmlspecialchars($_POST['categorie']);
        }

        if($err == 0)
        {

            $dossier = '../images/upload/website/';
            $fichier = basename($_FILES['image']['name']);
            $taille_maxi = 2000000;
            $taille = filesize($_FILES['image']['tmp_name']);
            $extensions = array('.png','.gif','.jpg','.jpeg');
            $extension = strrchr($_FILES['image']['name'], '.');

            if(!in_array($extension,$extensions))
            {
                $err == 8;
            }
            if($taille>$taille_maxi)
            {
                $err = 9;
            }

            if($err == 0)
            {
                $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                $fichiercpt = rand().$fichier;

                if(move_uploaded_file($_FILES['image']['tmp_name'],$dossier.$fichiercpt))
                {
                    require "../connexion.php";
                    $insert = $bdd->prepare("INSERT INTO websites(name,date,description,image,url,github,figma,categorie) VALUES(?,?,?,?,?,?,?,?)");
                    $insert->execute([$name,$date,$description,$fichiercpt,$url,$github,$figma,$categorie]);
                    $insert->closeCursor();
                    header("LOCATION:websites.php?addsuccess=ok");
                }else{
                    header("LOCATION:addWebsite.php?error=10");
                }

            }else{
                header("LOCATION:addWebsite.php?error=".$err);
            }
        }else{
            header("LOCATION:addWebsite.php?error=".$err);
        }

    }else{
        header("LOCATION:addWebsite.php");
    }
?>