<?php
require("params\BDD\bdd.php");

if(isset($_POST['newemail']))
{
    $log = $_SESSION['login'];
    $newemail = addslashes($_POST['newemail']);
    $req = $bdd->prepare("UPDATE users SET login=? WHERE login LIKE ? ");
    $st = $bdd->errorCode();
    $req->execute(array($newemail, $log));
    if ($st == 23000)
    {
        ?>
            <script type="text/javascript">
                alert('Compte déjà existant');
            </script>
        <?php
    }
    else
    {
        echo "information modifiée enregistrée, vous allez etre redirigé dans 5 sec !";
        session_destroy();
        ?>
        <script>
        window.location.href = "index.php?page=connexion";
        </script>
        <?php
    }
}


if(isset($_SESSION['login']))
    {
?>
        <!-- formulaire -->
        <div class="background">
                <div class="container">
                    <br>
                    <h2 class="form-group">modifier votre e-mail :</h2>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="email">Nouveau e-mail :</label>
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
    }

else
    {
        ?>
            <script type="text/javascript">
                document.location.href = 'index.php?page=home';
            </script>
        <?php
    }
?>