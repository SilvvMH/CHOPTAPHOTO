<?php
require("params\BDD\bdd.php");


    if (isset($_POST['newpassword'], $_POST['newpasswordconfirm']))
    {
        $log = $_SESSION['login'];
        $passwd = md5($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $newpasswordconfirm = md5($_POST['newpasswordconfirm']);
        if($passwd = $newpassword)
        {
            ?>
            <div style="display: flex;align-items: center;">
                <p style="border: 1px solid black;background-color: red; color: white;padding: 5px;border-radius:25px ;" >Ancien et nouveau mot de passe identiques</p>
            </div>
        <?php
        }
        else if($newpassword == $newpasswordconfirm) 
        {
            $req = $bdd->prepare('UPDATE users SET passwd = ? WHERE login = ? AND passwd = ?');
            $req->execute(array($newpassword, $_SESSION['login'], $passwd));
            session_destroy();
            $delai=0; 
            header("Refresh: $delai");
            ?>
                <script type="text/javascript">
                    alert('vous devez vous reconnecter pour actualiser votre nouveau mot de passe');
                    document.location.href = 'index.php?page=connexion';
                </script>
            <?php
        }   
        else
        {
            ?>
                <div style="display: flex;align-items: center;">
                    <p style="border: 1px solid black;background-color: red; color: white;padding: 5px;border-radius:25px ;" ><strong>Attention !</strong> Vous n'avez pas tapé deux fois le même mot de passe, veuillez réessayer</p>
                </div>
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
            <h2 class="form-group">modifier votre mot de pass :</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="pwd">Ancien mot de passe :</label>
                    <input type="password" class="form-control" placeholder="Entrer votre ancien mot de passe" name="password">
                </div>
                <div class="form-group">
                    <label for="pwd">Nouveau mot de passe :</label>
                    <input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="newpassword">
                </div>
                <div class="form-group">
                    <label for="pwd">Confirmez votre nouveau mot de passe :</label>
                    <input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="newpasswordconfirm">
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
<p>veuillez vous connecter a votre compte avant</p>

<?php
            }
?>