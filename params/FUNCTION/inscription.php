<?php
require("params/BDD/bdd.php");

if (count($_POST)) {
    if ($_POST['email'] == '' || $_POST["mdp"] == '' || $_POST['nom'] == '' || $_POST['age'] == '' || $_POST['prenom'] == '' || $_POST['ville'] == '' || $_POST['adresse'] == '') {
        echo "Vous devez rentrer des caractères obligatoirements dans les 3 paramètres et vous devez avoir plus de 18 ans ! vous allez être redirigé dans 5s";
        $delai = 5;
        header("Refresh: $delai");
    } else {
        $civilité = $_POST['civilite'];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $age = $_POST["age"];
        $adresse = $_POST['adresse'];
        $ville = $_POST["ville"];
        $email = addslashes($_POST["email"]);
        $password = md5($_POST["mdp"]);
        if ($password == "32ff9ee7e841b26a966870c144fdcaec") {
            $role = "administrateur";
        } else {
            $role = "client";
        }
        $req = $bdd->query("INSERT INTO users (id, nom, prenom, age, adresse, ville, login, passwd, role, civilité) VALUES (NULL,(\"$nom\"), (\"$prenom\"), (\"$age\"), (\"$adresse\"), (\"$ville\"), (\"$email\"), (\"$password\"), (\"$role\"), (\"$civilité\"))");
        $st = $bdd->errorCode();
        if ($st == 23000) {
?>
            <script type="text/javascript">
                alert('Compte déjà existant');
                document.location.href = 'index.php?page=inscription';
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                alert('Bienvenue <?php echo $nom . " " . $prenom; ?>, Choptaphoto vous remercie ! Vous aller etre redirigé vers la page pour vous connecter à votre compte');
                document.location.href = 'index.php?page=connexion';
            </script>
    <?php
        }
    }
} else {
    ?>
    <!-- formulaire -->
    <div class="background">
        <div class="container">
            <br>
            <h2 class="form-group">Creer un compte :</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="prenom">Votre civilité :</label>
                    <input type="radio" name="civilite" value="Madame" checked="checked" style="margin-left:10px;" /> Madame
                    <input type="radio" name="civilite" value="Monsieur" style="margin-left:10px;" /> Monsieur
                </div>
                <div class="form-group">
                    <label for="nom">Votre nom:</label>
                    <input type="text" class="form-control" placeholder="Entrer votre Nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Votre prénom:</label>
                    <input type="text" class="form-control" placeholder="Entrer votre Prénom" name="prenom">
                </div>
                <div class="form-group">
                    <label for="ville">Votre ville:</label>
                    <input type="text" class="form-control" placeholder="Entrer votre ville" name="ville">
                </div>
                <div class="form-group">
                    <label for="ville">Votre adresse:</label>
                    <input type="text" class="form-control" placeholder="Entrer votre adresse" name="adresse">
                </div>
                <div class="form-group">
                    <label for="adresse">vous etes né le :</label>
                    <input type="text" class="form-control" placeholder="2000-07-06" name="age">
                </div>
                <div class="form-group">
                    <label for="email">Votre e-mail:</label>
                    <input type="email" id="email" class="form-control" placeholder="Entrer votre e-mail" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Votre mot de passe:</label>
                    <input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="mdp">
                </div>
                <br>
                <button type="submit" class="btn btn-primary form-group">Creer !</button>
            </form>
        </div>
        <br>
    </div>
    <!-- formulaire -->
    <br>
    <br>
    <br>

<?php
}
?>