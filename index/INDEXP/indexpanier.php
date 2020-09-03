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
</style>

</head>


<?php

             if(!isset($_SESSION["panier"]))
                $_SESSION["panier"] = array();
            
            if(isset($_GET["id"], $_GET["qtt"]))
            {
                $prod = addslashes($_GET["id"]);
                $qtt = addslashes($_GET["qtt"]);
                addtocart($prod,$qtt);
            }

            playPanier($bdd);

            function    addtocart($prod,$qtt)
            {
                $add = false;
                for($i=0; $i < count($_SESSION["panier"]) && !$add ; $i++)
                {
                    if($_SESSION["panier"][$i]["produit"] == $prod)
                    {
                        $_SESSION["panier"][$i]["qtt"] += $qtt;
                        $add = true;
                    }
                }
                if(!$add)
                {
                    $_SESSION["panier"][] = array("produit"=>$prod,"qtt"=>$qtt);
                }
                return(true);
            }

            function    playPanier($bdd)
            {
                ?>
                    <div class="containerpanier">
                    <table class="table table-bordered">
                        <tbody>
                        <?php
                            for($i=0; $i < count($_SESSION["panier"]); $i++)
                            {
                                $id=$_SESSION["panier"][$i]["produit"];
                                $req = "SELECT * FROM products WHERE id=" . $id;
                                $ORes = $bdd->query($req);
                                if($produit = $ORes->fetch())
                                    {
                                        if($_SESSION["panier"][$i]["qtt"] > $produit->quantité)
                                            {
                                                ?>
                                                <div class="containerproduct">

                                                <div class="produit">

                                                    <div class="image">

                                                        <img src="<?php echo $produit->lienimage; ?>"></img>

                                                    </div>

                                                    <div class="info">

                                                        <div class="text">

                                                            <h2><?php echo $produit->name; ?></h2>
                                                            <p><?php echo $produit->description; ?></p>
                                                            <p><?php echo "achat immpossible, plus de stock"?></p>
                                                            

                                                        </div>


                                                    </div>

                                                    
                                                    <div class="delete">

                                                        <a href="index.php?page=delete&id=<?php echo $id; ?>"><i style="align-items: center; margin-left: 25px; color: black;" class="fas fa-trash-alt"></i></a>

                                                    </div>

                                                </div>

                                                </div>
                                                <?php
                                            }
                                        else
                                            {
                                                $prixTTC = round($produit->price * 1.196 * $_SESSION["panier"][$i]["qtt"], 2);
                                                ?>
                                                    <div class="containerproduct">

                                                    <div class="produit">

                                                        <div class="image">

                                                            <img src="<?php echo $produit->lienimage; ?>"></img>

                                                        </div>

                                                        <div class="info">

                                                            <div class="text">

                                                                <h2><?php echo $produit->name; ?></h2>
                                                                <p><?php echo $produit->description; ?></p>

                                                            </div>

                                                            <div class="prix">

                                                                <h3 style="color: grey; font-size:10px;"><?php echo $produit->price ?> €/ pièce</h3>
                                                                <h3>Total : <?php echo $produit->price * $_SESSION["panier"][$i]["qtt"]; ?> €</h3>

                                                            </div>

                                                            <div class="stock">

                                                                <?php
                                                                    if($produit->categorie == "impression" && $produit->quantité < 5 )
                                                                    {
                                                                        ?>
                                                                            <h4 style="color: orange;">Il reste que <?php echo $produit->quantité; ?> en stock</h4>
                                                                        <?php
                                                                    }
                                                                    else if ($produit->categorie == "impression")
                                                                    {
                                                                        ?>
                                                                        <h4><?php echo $produit->quantité; ?> en stock</h4>
                                                                    <?php
                                                                    }
                                                                    else 
                                                                    {

                                                                    }
                                                                ?>

                                                            </div>


                                                        </div>
                                                        <?php
                                                            if ($produit->categorie == "borne")
                                                            {
                                                                ?>
                                                                <div class="interaction">

                                                                    <div class="qtt">

                                                                        <h5><?php echo $_SESSION["panier"][$i]["qtt"]; ?></h5>

                                                                    </div>

                                                                    <div class="delete">

                                                                        <a href="index.php?page=delete&id=<?php echo $id; ?>"><i style="align-items: center; margin-left: 25px; color: black;" class="fas fa-trash-alt"></i></a>

                                                                    </div>

                                                                </div>
                                                                <?php

                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <div class="interaction">

                                                                    <div class="qtt">

                                                                        <a href="index.php?page=indexpanier&id=<?php echo $produit->id; ?>&qtt=-1"><img src="img/moins.png"></a>
                                                                        <h5><?php echo $_SESSION["panier"][$i]["qtt"]; ?></h5>
                                                                        <a href="index.php?page=indexpanier&id=<?php echo $produit->id; ?>&qtt=1"><img src="img\plus.png"></a>

                                                                    </div>

                                                                    <div class="delete">

                                                                        <a href="index.php?page=delete&id=<?php echo $id; ?>"><i style="align-items: center; margin-left: 25px; color: black;" class="fas fa-trash-alt"></i></a>

                                                                    </div>

                                                                </div>
                                                                <?php
                                                            }
                                                        ?>


                                                    </div>

                                                    </div>
                                                 <?php

                                            }
                                    }
                                    if($_SESSION["panier"][$i]["qtt"] <= 0)
                                    {
                                        session_start();                          //demarrage de la session
                                        $ref = $_GET['id'];                //reference du produit a retirer
                                        $array = $_SESSION['panier']; //attribue le tableau a $array
        
                                        
                                        $key = array_search($ref, $array); //recherche la raference et attribue son rang dans le tableau a $key
        
                                        
                                        array_splice($_SESSION['panier'], $key, 1); //fonction PHP qui retire l'element situe au rang enregistre dans $key
                                        ?>
        
                                            <script>
                                        window.location.href = "index.php?page=indexpanier";
                                        </script>
                                           <?php
                                    }
                            }
                            if($_SESSION['panier'])
                            {
                                $prix_total   = 0;
                                $total_panier = count($_SESSION['panier']);
                                    for ($i=0; $i < $total_panier; $i++)
                                        {
                                            $prix=0;
                                            $req = "SELECT * FROM products WHERE id=" . $_SESSION["panier"][$i]["produit"];
                                            $Ores = $bdd->query($req);
                                            while ($donnees = $Ores->fetch()) //on affiche la liste des produits
                                                {
                                                    $prix_unitaire = $donnees->price;
                                                    $prix += $_SESSION['panier'][$i]['qtt'] * $prix_unitaire; 
                                                }
                                            $prix_total += $prix;
                                            $prix_TTC=round($prix_total * 1.196, 2);
                                        }
                                ?>
                                <br>
                                <br>
                                <br>
                                        <div style="margin-right: 40px;float: right; padding-bottom: 30px; " class="dropdown" style="float:left;">
                                            <a href="index.php?page=payement"><button class="dropbtn">Commander</button></a>
                                        </div>
                                        <div style="margin-right: 25px; align-items: center;float: right; border: solid black 3px; border-radius:10px; padding:10px; vertical-align: center;">
                                        <?php
                                        // if ($_POST['codepromo'] == "promo-2020")
                                        // {
                                        //     $reduc = $prix_TTC * 0.2;
                                        //     $prix_TTC_promo = $prix_TTC - $reduc;
                                            ?>
                                            <!-- <p>Prix TTC :<?php echo $prix_TTC_promo; ?> €</p> -->
                                            <?php
                                        // }
                                        // else
                                        // {
                                            ?>
                                                <p>Prix TTC :<?php echo $prix_TTC; ?> €</p>
                                            <?php

                                        // }


                                        ?>
                                        </div>
                                        <div style="margin-right: 25px; align-items: center;float: right; border: solid black 1px; padding:10px; border-radius:10px; vertical-align: center;">
                                            <p>Prix HT :<?php echo $prix_total; ?> €</p>
                                        </div>
                                        <div style="margin-right: 25px; align-items: center;float: right; border: solid black 1px; padding:10px; border-radius:10px; vertical-align: center;">
                                            <p>Nombre de produit dans la panier : <?php echo count($_SESSION['panier']); ?></p>
                                        </div>
                                        <div style="margin-right: 25px; align-items: center;float: right; padding:10px; vertical-align: center;">
                                            <p>Code promo :</p>
                                            <input name="codepromo" type="text" placeholder="entrer un code promo"></input>
                                            <a onClick="window.location.reload();"><button type="submit">tester</button></a>
                                        </div>
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
                            else 
                            {
                                ?>
                                <br>
                                <br>
                                <br>
                                    <!----------------panier vide----------------->
                                    <div class="panier">
                                        <div class="h1">
                                            <p>Mon panier</p>
                                        </div>
                                        <div class="container">
                                            <img class="logopanier" src="img/shopping-basket.png">
                                            <h4 class="titrepanier">Votre panier est vide ! Pour faire vos achats, cliquer ici :<p class="textpanier"></p></h4>
                                        </div>
                                    <!----------------panier vide----------------->
                                    <!--BR-->
                                    <br>
                                    <br>
                                    <!--BR-->
                                    <!--bouton continuer les achats-->
                                    <div class="boutonpanier">
                                        <a class="a" href="index.php">
                                            <button type="button" class="icons btn btn-primary">Faire mes achats</button>
                                        </a>
                                    </div>
                                </div>
                                    <!--bouton continuer les achats-->

                                    <!-----container agence...------>
                                    <div class="container3">
                                    <p class="icons2"><i class="fas fa-thumbtack"></i>
                                        <p class="textbannerpanier">Découvrer les stocks et prix des
                                            <br>bornes en vente dans notre agence.</p>
                                    </p>
                                    <p class="icons2"><i class="fas fa-comments"></i>
                                        <p class="textbannerpanier">Si vous avez un probleme avec une borne
                                            <br>ou une question, nos conseillés sont disponnibles.</p>
                                    </p>
                                    <p class="icons2"><i class="fas fa-credit-card"></i>
                                        <p class="textbannerpanier">Nous acceptons les payments par
                                            <br>carte bancaire ou virement bancaire.</p>
                                    </div>
                                    <!-----container agence...------>

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
                <?php
            }
            ?>