<?php
session_start();
require("params/BDD/bdd.php");
?>


<!doctype html>

<!--html-->
<html>
<!--head-->
<head>
	
<!--meta-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Anton|Yanone+Kaffeesatz&display=swap" rel="stylesheet">
<!--meta-->

<?php 

    if (isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
        $p = "home";



    switch ($p)
    {
        case "indexbornes"; 
            echo '<link rel="stylesheet" href="css/mainbornes.css">';
        break;
        case "indexbornesvisiteur"; 
            echo '<link rel="stylesheet" href="css/mainbornes.css">';
        break;
        case "indeximpressionvisiteur"; 
            echo '<link rel="stylesheet" href="css/mainimpression.css">';
        break;
        case "home";
            echo '<link rel="stylesheet" href="css/main.css">';
        break;
        case "modificationemail";
            echo '<link rel="stylesheet" href="css/main.css">';
        break;
        case "modificationpassword";
            echo '<link rel="stylesheet" href="css/main.css">';
        break;
        case "modificationinfos";
            echo '<link rel="stylesheet" href="css/main.css">';
        break;
        case "ajouterunarticle";
            echo '<link rel="stylesheet" href="css/main.css">';
        break;
        case "connexion";
            echo '<link rel="stylesheet" href="css/mainconnection.css">';
        break;
        case "inscription";
            echo '<link rel="stylesheet" href="css/maininscription.css">';
        break;
        case "indeximpression";
            echo '<link rel="stylesheet" href="css/mainimpression.css">';
        break;
        case "indexentreprise";
        echo '<link rel="stylesheet" href="css/mainentreprise.css">';
        break;
        case "indexpanier";
        echo '<link rel="stylesheet" href="css/mainpanier.css">';
        break;
        case "indexinfocompte";
        echo '<link rel="stylesheet" href="css/mainindexinfocompte.css">';
        break;
        case "deconnexion";
        echo '<link rel="stylesheet" href="css/main.css">';
        break;
        case "delete";
        echo '<link rel="stylesheet" href="css/main.css">';
        break;
        case "reservation";
        echo '<link rel="stylesheet" href="css\mainconnection.css">';
        break;
        case "payement";
        echo '<link rel="stylesheet" href="css\payement.css">';
        break;
        // css produits
        case "indexbornesviolette";
            echo '<link rel="stylesheet" href="css/mainproduits.css">';
        break;
        case "indexbornesrouge";
            echo '<link rel="stylesheet" href="css/mainproduits.css">';
        break;
        case "indexbornesnoir";
            echo '<link rel="stylesheet" href="css/mainproduits.css">';
        break;
        case "indexbornesblanche";
            echo '<link rel="stylesheet" href="css/mainproduits.css">';
        break;
        case "indexbornesjaune";
            echo '<link rel="stylesheet" href="css/mainproduits.css">';
        break;
        case "indexbornesbleu";
            echo '<link rel="stylesheet" href="css/mainproduits.css">';
        break;
    }

?>

<!--title-->
<title>ChopTaPhotoo</title>
<!--title-->
	
</head> 
<!--head-->

<?php

$p = array("indexbornes" => "index/INDEXP/indexbornes.php",
            "indexbornesvisiteur" => "visiteurs\indexbornes.php",
            "indeximpressionvisiteur" => "visiteurs\indeximpression.php",
           "indexbornesbleu" => "index/INDEXS/indexbornebleu.php",
           "indexbornesjaune" => "index/INDEXS/indexbornejaune.php",
           "indexbornesblanche" => "index/INDEXS/indexborneblanche.php",
           "indexbornesnoir" => "index/INDEXS/indexbornenoir.php",
           "indexbornesrouge" => "index/INDEXS/indexbornerouge.php",
           "indexbornesviolette" => "index/INDEXS/indexborneviolette.php",
           "indexinfocompte" => "index/INDEXP/indexinfocompte.php",
           "indexpanier" => "index/INDEXP/indexpanier.php",
           "indeximpression" => "index/INDEXP/indeximpression.php",
           "indexentreprise" => "index\INDEXP\indexentreprise.php",
           "modificationpassword" => "params\FUNCTION\modifier le mot de passe.php",
           "modificationemail" => "params\FUNCTION\modifier le mail.php",
           "modificationinfos" => "params\FUNCTION\modifier les infos.php",
           "ajouterunarticle" => "params\FUNCTION\ajouterunarticle.php",
           "connexion" => "params/FUNCTION/connexion.php",
           "inscription" => "params/FUNCTION/inscription.php",
           "deconnexion" => "params/FUNCTION/deconnexion.php",
           "delete" => "params/FUNCTION/delete.php",
           "reservation" => "params/FUNCTION/reservation.php",
           "payement" => "params/FUNCTION/payement.php");

if (isset($_GET["page"])){
    $page = $p[$_GET['page']];
    $pagevisiteur = $p[$_GET['page']];
}
else{
    $page="index/INDEXP/home.php";
    $pagevisiteur="visiteurs\home.php";
}
if (isset($_SESSION['login'])){
    include('client/header.php');
    include($page);
    include('client/footer.php');
}
else if (isset($_SESSION['admin'])){
    include('admin/header.php');
    include($page);
    include('admin/footer.php');
}
else{
    include('visiteurs/header.php');
    include($pagevisiteur);
    include('visiteurs/footer.php');
}
?>