<?php
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
    {
        $err=0;
        if(empty($_POST['name']))
        {
            $err=1;
        }else{ 
            $name = htmlspecialchars($_POST['name']);
        }

        if(empty($_POST['email']))
        {
            $err=2;
        }else{
            $email = $_POST['email'];
            if(!preg_match("#^[a-z0-9\._-]+@[a-z0-9_-]{2,}\.[a-z]{2,4}$#",$email))
            {
                $err=3;
            }
        }

        if(empty($_POST['message']))
        {
            $err=4;
        }else{
            $message = htmlspecialchars($_POST['message']);
        }

        if($err==0)
        {
            require "connexion.php";
            $insert = $bdd->prepare("INSERT INTO contact(name,email,date,message) VALUES(:name,:email,NOW(),:message)");
            $insert->execute([
                ":name" => $name,
                ":email"=>$email,
                ":message"=>$message
            ]);

            header("LOCATION:index.php?sendSuccess=success#contact");

        }else{
            header("LOCATION:index.php?sendFail=".$err."#contact");
        }


    }else{
        header("LOCATION:index.php");
    }