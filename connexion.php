<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=sdgy0690_portfolio;charset=utf8','sdgy0690_alexandresacre','monuser15%3',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur: '.$e->getMessage());
    }
?>