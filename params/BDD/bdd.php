<?php

// PHPMYADMIN
$bdUser = "root"; // Utilisateur de la base de données
$bdPasswd = ""; // Son mot de passe
$dbname = "1921sio"; // nom de la base de données
$host = "localhost"; // Hôte

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $bdUser, $bdPasswd);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo ("Erreur : impossible de se connecter à la bdd");
}


//alwaysdata
// $bdUser = "benoitvdp_admin"; // Utilisateur de la base de données
// $bdPasswd = "efficom"; // Son mot de passe
// $dbname = "benoitvdp_choptaphoto"; // nom de la base de données
// $host = "mysql-benoitvdp.alwaysdata.net"; // Hôte

// try {
//     $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $bdUser, $bdPasswd);
//     $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// } catch (Exception $e) {
//     echo ("Erreur : impossible de se connecter à la bdd");
// }
