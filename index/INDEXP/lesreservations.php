<?php
    $bdUser = "root"; // Utilisateur de la base de données
    $bdPasswd = ""; // Son mot de passe
    $dbname = "1921sio"; // nom de la base de données
    $host= "localhost"; // Hôte

    try
    {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $bdUser, $bdPasswd);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    catch (Exception $e)
    {
        echo ("Erreur : impossible de se connecter à la bdd");
    }

    if(isset($_POST["debut"], $_POST["fin"]))
    {
      $debut = $_POST["debut"];
      $fin = $_POST["fin"];
    }
    else
    {
      $mois = date("m");
      $annee = date("Y");
      $debut = date("d/m/Y", mktime(0, 0, 0, $mois, 1 ,$annee)); //jour 1 du mois
      $fin = date("d/m/Y", mktime(0, 0, 0, $mois +1, 0, $annee)); //fin, jour 0
    }

    if(isset($_POST['borne']))
      {
        $borne = $_POST["borne"] ;
        $req = "SELECT products.name, users.nom, reservation.debut, reservation.fin 
        FROM reservation 
        JOIN users
        ON users.id = reservation.idClient
        JOIN products 
        ON products.id = reservation.idBorne 
        WHERE  idBorne = $borne AND reservation.debut 
        BETWEEN ('$debut') 
        AND ('$fin')";
      }
      else
      {
        $req = "SELECT products.name, users.nom, reservation.debut, reservation.fin 
        FROM reservation 
        JOIN users
        ON users.id = reservation.idClient
        JOIN products 
        ON products.id = reservation.idBorne 
        WHERE reservation.debut 
        BETWEEN ('$debut') 
        AND ('$fin')";
      }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='params/lib/main.css' rel='stylesheet' />
<script src='params/lib/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      height: '100%',
      expandRows: true,
      slotMinTime: '08:00',
      slotMaxTime: '20:00',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialView: 'dayGridMonth',
      initialDate: '2020-09-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        <?php
        $debut = $_POST["debut"];
        $fin = $_POST["fin"];
        

        $Ores = $bdd->query($req);
        $i=0;
        while ($resa=$Ores->fetch())
        {
          if ($i > 0)
            echo ',';
            echo "
                  {
                      title : '" . $resa->name . " réservée par " . $resa->nom . "',
                      start : '" . $resa->debut . "',
                      end : '" . $resa->fin . " 23:59:00". "'
                  }
                ";
            $i++;
        }
        ?>
      ]
    });

    calendar.render();
  });

</script>
<style>

  html, body {
    overflow: hidden; /* don't do scrollbars */
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar-container {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }

  .fc-header-toolbar {
    /*
    the calendar will be butting up against the edges,
    but let's scoot in the header's buttons
    */
    padding-top: 1em;
    padding-left: 1em;
    padding-right: 1em;
  }

</style>
</head>
<body>

  
  <div id='calendar-container'>
    <form action="" method="POST">
      <p>Planning des réservation :</p>
      <input type="date" name="debut">
      <input type="date" name="fin">
      <?php
        $req2 = "SELECT id, name FROM products";
        $Ores = $bdd->query($req2);
      ?>
      <select name="borne">
      <?php 
        $j = 0;
        while($info=$Ores->fetch())
        {
          if($j>-1)
          {
            echo "<option value=" . $info->id . ">$info->name</option>";
          }
          $j++;
        }
      ?>
      </select>
      <button type="submit" >Voir les réservations</button>
    </form>
    <div id='calendar'></div>
  </div>

</body>
</html>
