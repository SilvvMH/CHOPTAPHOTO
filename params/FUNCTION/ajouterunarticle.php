<?php
require("params/BDD/bdd.php");

if(count($_POST))
{
    if(isset($_POST["NomDeLarticle"], $_POST["description"], $_POST["price"], $_POST["quantité"]));
    {
        $name = addslashes($_POST["NomDeLarticle"]);
        $description = addslashes($_POST["description"]);
        $price = addslashes($_POST["price"]);
        $quantité = addslashes($_POST["quantité"]);

        $req = $bdd->query("INSERT INTO products(name, description, price, quantité) VALUES (\"$name\", \"$description\", \"$price\", \"$quantité\")");
        echo "vous avez bien ajouté un produit, félicitation ! vous allez etre redirigé dans 3 sec";
        $delai=2; 
        header("Refresh: $delai");
    }
}
else
{
        ?>
                <!-- formulaire -->
                <div class="background">
                    <div class="container">
                        <br>
                        <h3 class="form-group">Ajouter un article a la base de donnée :</h3>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="email">Nom du produit :</label>
                                <input type="text" class="form-control" placeholder="Entrer un nom" name="NomDeLarticle">
                            </div>
                            <div class="form-group">
                                <label for="email">Description du produit :</label>
                                <input type="text" class="form-control" placeholder="Entrer une description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="email">Prix du produit :</label>
                                <input type="text" class="form-control" placeholder="Entrer un prix" name="price">
                            </div>
                            <div class="form-group">
                                <label for="email">Quantité disponnible :</label>
                                <input type="text" class="form-control" placeholder="Entrer une quantité" name="quantité">
                            </div>
                            <button type="submit" class="btn btn-primary form-group">Enregistrer</button>
                        </form>
                    </div>
                    <br>
                </div>
                <br>
                <br>
                <br>
                <!-- formulaire -->
        
        <?php
}
        ?>


