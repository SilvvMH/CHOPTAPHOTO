
<!DOCTYPE html>
<html lang="fr">

<head>
<style>
.dropbtn {
  background-color: rgba(255,0,187,1.00);
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 10px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: rgb(143, 0, 105);}
</style>
</head>

<body>

    <!----------------formulaire PRODUIT----------------->
    <div class="produit flex-mob-col">
    <div class="container">
        <?php
                $req = "SELECT name, price, quantité, codepromo, description FROM products WHERE id=6";
                $ORes = $bdd->query($req);
                while($produit = $ORes->fetch())
                {
        ?>
      <img class="imageproduit" src="img/bornjaune.png">
      <h4 class="titreproduit"><?php echo $produit->name; ?>
        <p class="textproduit"><?php echo $produit->description; ?></p>
        <ul class="textproduit">
          <li><strike>flash</strike><a class="textproduit aaa" href="index.php?page=indexbornesnoir"> (uniquement sur les bornes prenium)</a></li>
          <li><strike>Fond vert disponnible</strike></li>
          <li>Ecran simple</li>
          <li>Caméra 4K</li>
          <li>Photos disponnibles sous 48h</li>
          <li>Installation rapide</li>
          <li>Dépannage sous 5h</li>
        </ul>
        <br>
        <p class="promo">Prix :<?php echo $produit->price; ?>€</p>
        <p class="textproduit">Économisez : 19,99€ (20%) avec le code : <?php echo $produit->codepromo; ?></p>
        <p class="textproduit"><strong>Livraison GRATUITE</strong> en <strong>point retrait.</strong></p>
        <p class="enstockorange">Plus que <?php echo $produit->quantité; ?> exemplaires.</p>
        <p class="textproduit aaaa" >disponible en d'autres coloris :</p>
        <a href="index.php?page=indexbornesbleu"><img class="disponibilite" src="img/bornbleu.png"></a>
        <a href="index.php?page=indexbornesblanche"><img class="disponibilite" src="img/bornblanche.png"></a>
        <a href="index.php?page=indexbornesviolette"><img class="disponibilite" src="img/bornviolet.png"></a>
		  </h4>
    </div>
 

    <div class="livraison">
                <strong>Livraison GRATUITE</strong> en France métropolitaine.
                <br>
                <br> Livré : <strong>Sous 5 jours.</strong>
                <br>
                <br> Livraison accélérée : <strong>Sous 1 jours.</strong>
                <br> (Si vous commandez dans les <strong>20 h et 39 mins</strong>)
                <br>
                <br>
                <div class="dropdown" style="float:left;">
                  <a href="index.php?page=reservation&idBorne=6"><button class="dropbtn">commander</button></a>
                </div>
                <br>
                <br>
    </div> 
  </div>
    <!----------------formulaire PRODUIT----------------->

    <!-------------background haut du site------------>
    <div class="backgroundbasdusite">
        <img src="img/FOND-NOIR-PENCHE - Copie.png">
    </div>
    <!-------------background haut du site------------>

    <!-----container contact------>
    <div class="container1">
        <p><i class="fas fa-clock"></i></p>
        <p><i class="fas fa-truck"></i></p>
        <p><i class="fas fa-cart-arrow-down"></i></p>
        <p><i class="fas fa-camera-retro"></i></p>
    </div>
    <div class="container2">
        <p><strong>Retour gratuit</strong> en agence</p>
        <p><strong>Livraison</strong> gratuite**</p>
        <p><strong>Mes achats</strong> remboursés</p>
        <p><strong>Nos Bornes</strong> prenium</p>
    </div>
    <!-----container contact------>

</body>

</html>

<?php
                }
?>