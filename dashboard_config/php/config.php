<?php

  $username = $_POST['username'];
  $password = $_POST['password'];
  $asked_password = '';

  $db_username = 'xamp';
  $db_password = 'xamp';

  $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
  $db_username = fgets($myfileUsername);

  $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
  $db_password = fgets($myfilePasswort);

  /*Hashwert*/
  $hash = '';

  /*Variablen für die Verbindung zu Datenbank*/
  $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);

  /*Statemt um den Benutzernamen zu überprüfen*/
  $pdo_checkInsert = "SELECT password FROM config WHERE username = :user";

  /*Fügt den Hashwert zum überprüfen ein*/
  $pdo_insertHash = "INSERT INTO config_authentication (Hash) VALUES (:hashwert)";

  /*Prepariert die Abfrage vor und weist dem Platzhalter den Wert des Users zu*/
  $pdo_stmt1 = $pdo_db_connection->prepare($pdo_checkInsert);

  /*Prepariert die Eingabe des Hashwerter*/
  $pdo_stmt2 = $pdo_db_connection->prepare($pdo_insertHash);

  /*Überprüft ob der Benutzername in der DB existiert*/
  if($pdo_stmt1->execute(array('user' => $username)))
  {
      $result = $pdo_stmt1->fetch(PDO::FETCH_ASSOC);
      $asked_password = $result['password'];

      /*Falls das eingegebenen Passwort mit jenem aus der Datenbank übereinstimmt*/



      if($asked_password == $password && ($asked_password != "" || $password != ""))
      {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';


        $_SESSION['active'] = 'yes';
        $_SESSION["zeit"] = time();
        $_SESSION['pass'] = $password;

        $myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","w");
        fwrite($myfilePw,"yes");
        fclose($myfilePw);


        echo "<script>location.href='settings.php';</script>";
      //    echo "<script>window.open('settings.php');</script>";
      }
      else
      {
          echo "<h1>FEHLER</h1><br /><h3>Die eingegebenen Daten waren nicht korrekt</h3><br /><a href = '../config.html'>Zum Login</a>";
          $_POST = array();

      }

  }
  else
  {
      echo "<h1>FEHLER</h1><br /><h3>Die eingegebenen Daten waren nicht korrekt</h3><br /><a href = '../config.html'>Zum Login</a>";
      $_POST = array();

  }


  $_POST = array();




?>
