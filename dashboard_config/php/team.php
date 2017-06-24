<?php

$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);

if($accessPw == "yes")
{
  $person = $_POST['person'];
  $position = $_POST['position'];
  $email = $_POST['email'];
  $image = $_POST['bild'];
  $deleteoption = $_POST['deleteoption'];

  $db_username = "xamp" ;
  $db_password = "xamp";

  $defDir = "pic\\" . $image;

  $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
  $db_username = fgets($myfileUsername);

  $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
  $db_password = fgets($myfilePasswort);

  $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);

echo $deleteoption ." die option";


if(($deleteoption == 'default' || $deleteoption == '') && $person != "" &&$person != "" &&$person != "" && $image != "")
{

  /*fügt die daten der Datenbank hinzu*/
  $pdo_insertTeamInformation = "INSERT INTO appmenu_team (ImgPersonPath,ImgPersonShow,Person,Position,Mail) VALUES (:ip,:is,:pe,:po,:m)";

  /*Prepariert Eingabe der Kalendereinträge*/
  $pdo_stmt1 = $pdo_db_connection->prepare($pdo_insertTeamInformation);

  if($pdo_stmt1->execute(array('ip'=>$defDir,'is'=>$image,'pe'=>$person,'po'=>$position,'m'=>$email)))
  {
        echo "<script>location.href='manageteam.php';</script>";
  }
  else
  {

  }
}
else if($deleteoption != 'default')
{
  /*Löscht den gewählten Eintrag in der Datenbank damit er nicht merh angezeigt wird*/
  $pdo_deleteEntry = "DELETE FROM appmenu_team WHERE Person ='".$deleteoption."'";
  echo $pdo_deleteEntry ." delete statemtnt";

  /*Prepaiert den Lösch-Befehl*/
  $pdo_stmt2 = $pdo_db_connection->prepare($pdo_deleteEntry);

  if($pdo_stmt2->execute())
  {
   echo "<script>location.href='manageteam.php';</script>";
  }

}

echo "<script>window.open('manageteam.php');</script>";

}
else {
  echo "<h1>FEHLER</h1><br /><h3>Die eingegebenen Daten waren nicht korrekt</h3><br /><a href = '../config.html'>Zum Login</a>";
}
 ?>
