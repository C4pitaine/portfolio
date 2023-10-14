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
        header("LOCATION:langues.php");
    }

    require "../connexion.php";
    $req = $bdd->prepare("SELECT * FROM langages WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:langues.php");
    }
    $req->closeCursor();

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

            if(empty($_FILES['logo']['tmp_name']))
            {
                $update = $bdd->prepare("UPDATE langages SET langage=:langage,pourcentage=:pourcentage WHERE id=:myid");
                $update->execute([
                    ":langage" => $langage,
                    ":pourcentage" => $pourcentage,
                    ":myid" => $id
                ]);
                $update->closeCursor();
                header("LOCATION:langues.php?update=".$id);
            }else{
                $dossier = '../images/upload/logo/';
                $fichier = basename($_FILES['logo']['name']);
                $taille_maxi = 2000000;
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
                        unlink("../images/upload/logo/".$don['logo']);

                        $update = $bdd->prepare("UPDATE langages SET langage=:langage,pourcentage=:pourcentage, logo=:logo WHERE id=:myid");
                        $update->execute([
                            ":langage" => $langage,
                            ":pourcentage" => $pourcentage,
                            ":logo" => $fichiercpt,
                            ":myid" => $id
                        ]);
                        $update->closeCursor();
                        header("LOCATION:langues.php?update=".$id);
                    }
                }else{
                    header("LOCATION:updateLangage.php?id=".$id."&error=".$err);
                }
            }   
        }else{
            header("LOCATION:updateLangage.php?id=".$id."&error=".$err);
        }
    }else{
        header("LOCATION:updateLangage.php?id=".$id);
    }
?>