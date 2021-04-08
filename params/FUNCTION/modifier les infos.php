<?php
require("params/BDD/bdd.php");

if (isset($_SESSION['login'])) {
    if (isset($_POST['newnom'], $_POST['newprenom'])) {
        $log = $_SESSION['login'];
        $newnom = $_POST['newnom'];
        $newprenom = $_POST['newprenom'];
        $req = $bdd->prepare("UPDATE users SET nom = ?, prenom = ? WHERE login LIKE ? ");
        $req->execute(array($newnom, $newprenom, $log));
        echo "vous allez etre rediriger vers la page connexion pour que le site prend en compte votre demande.";
        session_destroy();
?>
        <script>
            window.setTimeout("location=('index.php?page=connexion');", 5000);
        </script>
    <?php
    }
    ?>
    <!-- formulaire -->
    <div class="background">
        <div class="container">
            <br>
            <h2 class="form-group">modifier vos informations :</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nom">Nouveau nom :</label>
                    <input type="text" class="form-control" placeholder="Entrer votre nom" name="newnom">
                </div>
                <div class="form-group">
                    <label for="prenom">Nouveau prénom :</label>
                    <input type="text" class="form-control" placeholder="Entrer votre prénom" name="newprenom">
                </div>
                <button type="submit" class="btn btn-primary form-group">Enregistrer</button>
            </form>
        </div>
        <br>
    </div>
    <!-- formulaire -->
<?php
} else {
?>
    <script>
        window.location.href = "index.php?page=home";
    </script>
<?php
}
?>