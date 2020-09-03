<?php
session_start();                          //demarrage de la session
$ref = $_GET['id'];                //reference du produit a retirer
$array = $_SESSION['panier']; //attribue le tableau a $array

 
$key = array_search($ref, $array); //recherche la raference et attribue son rang dans le tableau a $key

 
array_splice($_SESSION['panier'], $key, 1); //fonction PHP qui retire l'element situe au rang enregistre dans $key
?>

<script>
window.location.href = "index.php?page=indexpanier";
</script>