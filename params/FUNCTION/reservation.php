<?php 

require("params\BDD\bdd.php");
?>

<head>
<style>
.image {
    margin: 20px 40px 40px 40px;
}
.image img{
    width: 150px;
}
</style>
</head>

<?php 
if(isset($_GET['idBorne']))
{
    ?>
    <!-- formulaire -->
        <div class="background">
        <div class="container">
            <h2 class="form-group">Vous la voulez pour quand ?</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Du :</label>
                    <input type="date" class="form-control" name="debut">
                    <label for="email">Au :</label>
                    <input type="date" class="form-control" name="fin">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Réserver</button>
            </form>
        </div>
        <br>
        <?php
        $prod = "SELECT * FROM products WHERE id=" . $_GET['idBorne'];
    $ORes = $bdd->query($prod);
    if($produit = $ORes->fetch())
        {
            
            ?>
            <div class="image">
            <img src="<?php echo $produit->lienimage; ?>"></img>
            </div>
            <?php
        }
        ?>
    </div>
    <!-- formulaire -->
    <?php
}
else
{
    ?>
    <script>
    window.setTimeout("location=('index.php');",0);
    </script>
    <?php
}

if (isset($_GET['idBorne'], $_POST['debut'], $_POST['fin']))
{
    $idBorne = $_GET['idBorne'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $log = addslashes($_SESSION['login']);
    $req = "SELECT id  FROM users WHERE login LIKE (\"$log\") ";
    $ORes = $bdd->query($req);
    $usr = $ORes->fetch();
    $idClient = $usr->id;

    if (strtotime($debut) <= strtotime($fin) && strtotime($debut) > time())
    {
        if ((strtotime($fin) - strtotime($debut)) <= (7*86400))
        {
            function verifDispo($bdd, $idBorne, $debut, $fin)
            {
                 $req = "SELECT count(*) AS nbresa FROM reservation 
                 WHERE idBorne = $idBorne 
                 AND (
                         ((debut BETWEEN $debut AND $fin) AND (fin BETWEEN $debut AND $fin))
                         OR ($debut BETWEEN debut AND fin)
                         OR ($fin BETWEEN debut AND fin)
                     )";
                 $ORes = $bdd->query($req);
                 if($resa = $ORes->fetch())
                 return($resa->nbresa);
                 return(-1);
                }
                
                
                if(verifDispo($bdd, $idBorne, $debut, $fin) == 0)
                {
                    $tab = array($idBorne,$idClient,$debut, $fin);
                    $req = "INSERT INTO reservation (id, idBorne, idClient, debut, fin) VALUES (NULL, $idBorne, $idClient, '$debut', '$fin')";
                    $ORes = $bdd->prepare($req);
                    $ORes->execute($tab);
                    echo "Pour valider votre commande, veuillez procéder au payement en ";
                    ?><a href="index.php?page=indexpanier&id=<?php echo $idBorne; ?>&qtt=1"><button class="dropbtn">cliquant ici</button></a><?php   
                    echo "<br>rappel de la période que vous avez selectionné : ". $debut ." au ". $fin;             
                }
                else
                {
                    echo "La $borne->nom selectionnée n'est pas dispo au date selectionnées (". $debut ." au ". $fin . " ) voici les bornes disponibles aux dates entrées :</stronge> <br/><br/>";
                    $req = "SELECT * FROM products WHERE categorie = \"borne\" ORDER BY id ASC";
                    $ORes = $bdd->query($req);
                    if ($borne = $ORes->fetch())
                    {
                        if(verifDispo($bdd, $borne->id, $debut, $fin) == 0)
                        {
                            echo "La $borne->nom est disponible sur vos dates<br/>";
                        }
                    }
                }
        }
        else
        {
            echo "Pour des réservations supérieures à 7 jours, veuillez nous contacter";
        }
    }
    else
    {
        echo "Veuillez selectionner une date correcte";
    }
}
            ?>

            </div>
        </div>
        
    </body>
</html>

