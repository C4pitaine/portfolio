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
        header("LOCATION:websites.php");
    }

    require "../connexion.php";
    $req = $bdd->prepare("SELECT * FROM websites WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:websites.php");
    }
    $req->closeCursor();

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
            if(empty($_FILES['image']['tmp_name']))
            {
                $update = $bdd->prepare("UPDATE websites SET name=:name,date=:date,description=:description,url=:url,github=:github,figma=:figma,categorie=:categorie WHERE id=:myid");
                $update->execute([
                    ":name" => $name,
                    ":date" => $date,
                    ":description" => $description,
                    ":url" => $url,
                    ":github" => $github,
                    ":figma" => $figma,
                    ":categorie" => $categorie,
                    ":myid" => $id
                ]);
                $update->closeCursor();
                header("LOCATION:websites.php?update=".$id);
            }else{
                $dossier = '../images/upload/website/';
                $fichier = basename($_FILES['image']['name']);
                $taille_maxi = 2000000;
                $taille = filesize($_FILES['image']['tmp_name']);
                $extensions = array('.png','.gif','.jpg','.jpeg');
                $extension = strrchr($_FILES['image']['name'], '.');

                if(!in_array($extension,$extensions))
                {
                    $err = 8;
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

                        unlink("../images/upload/website".$don['image']);

                        $update = $bdd->prepare("UPDATE websites SET name=:name,date=:date,description=:description,image=:img,url=:url,github=:github,figma=:figma,categorie=:categorie WHERE id=:myid");
                        $update->execute([
                            ":name" => $name,
                            ":date" => $date,
                            ":description" => $description,
                            ":img" => $fichiercpt,
                            ":url" => $url,
                            ":github" => $github,
                            ":figma" => $figma,
                            ":categorie" => $categorie,
                            ":myid" => $id
                        ]);
                        $update->closeCursor();
                        header("LOCATION:websites.php?update=".$id);

                    }else{
                        header("LOCATION:updateWebsite.php?id=".$id."&error=10");
                    }
                }else{
                    header("LOCATION:updateWebsite.php?id=".$id."&error".$err);
                }
            }
        }else{
            header("LOCATION:updateWebsite.php?id=".$id."&error=".$err);
        }
    }else{
        header("LOCATION:updateWebsite.php?id=".$id);
    }

?>