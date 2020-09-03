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

session_start();
require("params\BDD\bdd.php");

if (isset($_GET['idBorne'], $_POST['debut'], $_POST['fin']))
{
    $idBorne = $_GET['idBorne'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];

    if (strtotime($debut) <= strtotime($fin) && strtotime($debut) > time())
    {
        if ((strtotime($fin) - strtotime($debut)) <= (7*86400))
        {
            function verifDispo($bdd, $idBorne, $debut, $fin)
            {
                 $req = "SELECT count(*) AS nbresa FROM reservation 
                 WHERE idBorne = $idBorne 
                 AND (
                         ((debut BETWEEN '$debut' AND '$fin') AND (fin BETWEEN '$debut' AND '$fin'))
                         OR ('$debut' BETWEEN debut AND fin)
                         OR ('$fin' BETWEEN debut AND fin)
                     )";
                 $ORes = $bdd->query($req);
                 if($resa = $ORes->fetch())
                 return($resa->nbresa);
                 return(-1);
                }
                
                
                if(verifDispo($bdd, $idBorne, $debut, $fin) == 0)
                {
                    $tab = array($idBorne,$idUsr,$debut, $fin);
                    $req = "INSERT INTO reservation(id,idBorne,idClient,debut,fin)
                            VALUES(NULL,?,?,?,?)";
                    $idUsr =$_SESSION['id'];
                    $ORes = $bdd->prepare($req);
                    $ORes->execute($tab);
                    echo "Pour valider votre commande, veuillez procéder au payement en ";
                    ?><a href="index.php?page=indexpanier&id=<?php echo $idBorne; ?>&qtt=1"><button class="dropbtn">cliquant ici</button></a><?php   
                    echo "<br>rappel de la période que vous avez selectionné : ". $debut ." au ". $fin;                  
                }
                else
                {
                    echo "La borne selectionnée n'est pas dispo voici les disponibilités des bornes : <br/><br/>";
                    $req = "SELECT * FROM bornes ORDER BY id ASC";
                    $Ores = $bdd->query($req);
                    if ($borne = $ORes->fetch())
                    {
                        if(verifDispo($bdd, $borne->id, $debut, $fin) == 0)
                        {
                            echo "Borne $borne->nom est disponible sur vos dates<br/>";
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
    
    if(isset($_GET['idBorne']))
    {
        ?>
        <!-- formulaire -->
            <div class="background">
            <div class="container">
                <br>
                <h2 class="form-group">Réservation :</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">Date de début de la réservation :</label>
                        <input type="date" class="form-control" name="debut">
                    </div>
                    <div class="form-group">
                    <label for="email">Date de fin de la réservation :</label>
                        <input type="date" class="form-control" name="fin">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Réserver</button>
                </form>
            </div>
            <br>
        </div>
        <!-- formulaire -->
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
    }
    else
    {
        ?>
        <script>
        window.setTimeout("location=('index.php');",0);
        </script>
        <?php
    }


            ?>

            </div>
        </div>
        
    </body>
</html>

