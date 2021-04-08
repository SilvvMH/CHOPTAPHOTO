<?php
require("params/BDD/bdd.php");

$log = $_SESSION['login'];
$oldemail = $_POST['oldemail'];

if (isset($_POST['newemail']) && isset($oldemail) && $log != $oldemail) {
?>
    <div style="display: flex;align-items: center;">
        <p style="border: 1px solid black;background-color: red;padding: 5px;border-radius:25px ;"><strong>Attention !</strong> Mot de passe incorrecte.</p>
    </div>
    <?php
} else {
    if (isset($_POST['newemail'])) {
        $newemail = addslashes($_POST['newemail']);
        $req = $bdd->prepare("UPDATE users SET login=? WHERE login LIKE ? ");
        $st = $bdd->errorCode();
        $req->execute(array($newemail, $log));
        if ($st == 23000) {
    ?>
            <script type="text/javascript">
                alert('Compte déjà existant');
            </script>
        <?php
        } else {
            echo "information modifiée enregistrée, vous allez etre redirigé dans 5 sec !";
            session_destroy();
        ?>
            <script>
                window.location.href = "index.php?page=connexion";
            </script>
    <?php
        }
    }
}



if (isset($_SESSION['login'])) {
    ?>
    <!-- formulaire -->
    <div class="background">
        <div class="container">
            <br>
            <h2 class="form-group">modifier votre e-mail :</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Ancien e-mail :</label>
                    <input type="email" class="form-control" placeholder="Entrer votre ancien e-mail" name="oldemail">
                    <label for="email">Nouvel e-mail :</label>
                    <input type="email" class="form-control" placeholder="Entrer votre e-mail" name="newemail">
                </div>
                <button type="submit" class="btn btn-primary form-group">Enregistrer</button>
            </form>
        </div>
        <br>
    </div>
    <!-- formulaire -->
    <br>
    <br>
    <br>
<?php
} else {
?>
    <script type="text/javascript">
        document.location.href = 'index.php?page=home';
    </script>
<?php
}
?>