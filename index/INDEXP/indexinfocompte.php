<?php 

require("params/BDD/bdd.php");

    $log = addslashes($_SESSION['login']);
    $req = "SELECT login, Nom, Prenom, ville, passwd, id, role, age, adresse FROM users WHERE login LIKE (\"$log\") ";
    $ORes = $bdd->query($req);

    while($usr = $ORes->fetch())
    {
        if($usr->role == "client")
            {
                ?>
                    <div class="tableinfo">

                    <h1>Mon profil</h1>

                    <div>
                        <h2>VOTRE NOM</h2>
                        <p><?php echo $usr->Nom; ?></p>
                    </div>

                    <div>
                        <h2>VOTRE PRENOM</h2>
                        <p><?php echo $usr->Prenom; ?></p>
                    </div>

                    <div>
                        <h2>VOTRE VILLE</h2>
                        <p><?php echo $usr->ville; ?></p>
                    </div>

                    <div>
                        <h2>VOTRE ADRESSE</h2>
                        <p><?php echo $usr->adresse; ?></p>
                    </div>

                    <div>
                        <h2>DATE DE NAISSANCE</h2>
                        <p><?php echo $usr->age; ?></p>
                    </div>

                    <div>
                        <h2>ADRESSE MAIL</h2>
                        <p><?php echo $usr->login;?></p>
                    </div>

                    <div>
                        <h2>MOT DE PASSE</h2>
                        <p>************</p> 
                    </div>
                    </div>


                    <div class="tableupdate">

                    <h1>Modifier le profil</h1>

                    <div>
                        <h2>INFORMATIONS</h2>
                        <a href="index.php?page=modificationinfos" ><button type="submit" class="btn btn-primary form-group">Modifier mes infos</button></a> 
                    </div>

                    <div>
                        <h2>ADRESSE MAIL</h2>
                        <a href="index.php?page=modificationemail" ><button type="submit" class="btn btn-primary form-group">Modifier mon e-mail</button></a>
                    </div>

                    <div>
                        <h2>MOT DE PASSE</h2>
                        <a href="index.php?page=modificationpassword" ><button type="submit" class="btn btn-primary form-group">Modifier mon mot de passe</button></a> 
                    </div>
                    </div>
                <?php
            }
            if($usr->role == "administrateur")
            {
                ?>
                    <div class="tableinfo">

                    <h1>Mon profil</h1>

                    <div>
                        <h2>VOUES ETES UN :</h2>
                        <p><?php echo $usr->role; ?></p>
                    </div>

                    <div>
                        <h2>VOTRE IDENTIFIANT</h2>
                        <p><?php echo $usr->login; ?></p>
                    </div>

                    <div>
                        <h2>MOT DE PASSE</h2>
                        <p>***********</p> 
                    </div>

                    </div>


                    <div class="tableupdate">

                    <h1>Modifier le profil</h1>

                    <div>
                        <h2>INFORMATIONS</h2>
                        <a href="index.php?page=modificationinfos" ><button type="submit" class="btn btn-primary form-group">Modifier mes infos</button></a> 
                    </div>

                    <div>
                        <h2>ADRESSE MAIL</h2>
                        <a href="index.php?page=modificationemail" ><button type="submit" class="btn btn-primary form-group">Modifier mon e-mail</button></a>
                    </div>

                    <div>
                        <h2>MOT DE PASSE</h2>
                        <a href="index.php?page=modificationpassword" ><button type="submit" class="btn btn-primary form-group">Modifier mon mot de passe</button></a> 
                    </div>

                    <div>
                        <h2>AJOUTER UN ARTICLE</h2>
                        <a href="index.php?page=ajouterunarticle" ><button type="submit" class="btn btn-primary form-group">Ajouter un article</button></a> 
                    </div>

                    <div>
                        <h2>VOIR LES RESERVATIONS</h2>
                        <a href="index\INDEXP\lesreservations.php" ><button type="submit" class="btn btn-primary form-group">Ajouter un article</button></a> 
                    </div>

                    </div>
                <?php
            }

        }
