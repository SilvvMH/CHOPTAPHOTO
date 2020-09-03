
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
  min-width: 100px;
  min-height: 100px;
  z-index: 1;
  font-size: 17px;
}

.dropdown-content a {
  color: black;
  padding: 5px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: rgb(143, 0, 105);}
</style>
</head>

    <!----------------formulaire PRODUIT----------------->
    <div class="produit">
        <div class="container">

            <?php
                    $req = "SELECT name, price, quantité, codepromo, description FROM products WHERE id=1";
                    $ORes = $bdd->query($req);
                    while($produit = $ORes->fetch())
                    {
            ?>
                <img class="imageproduit" src="img/born2.png">

                <h4 class="titreproduit"><?php echo $produit->name; ?>
                    <p class="textproduit"><?php echo $produit->description; ?>
                    <ul class="textproduit">
                        <li>flash</li>
                        <li>Ecran simple</li>
                        <li>Caméra 4K</li>
                        <li>Photos disponnibles sous 24h</li>
                        <li>Installation rapide</li>
                        <li>Dépannage sous 2h</li>
                        <li>Fond vert disponnible</li>
                        <li>Pack photo <a class="formatoffert" href="index.php?page=indeximpression#format10">Prenium format 10</a> offert (100 pièces)</li>
                    </ul>
                    <p class="promo">150€ /24h</p>
                    <p class="textproduit">Économisez : 19,99€ (20%) avec le code : <?php echo $produit->codepromo; ?></p>
                    <div class="dropdown" style="float:left;">
                  <a href="index.php?page=reservation&idBorne=1"><button class="dropbtn">commander</button></a>
                </div>
                <BR><BR>
                    <p class="textproduit aaaa" >disponible en rouge :</p>
                    <a href="index.php?page=indexbornesrouge"><img class="disponibilite" src="img/360x360-rose.png"></a>
                </h4>
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

    
<?php
                }
?>