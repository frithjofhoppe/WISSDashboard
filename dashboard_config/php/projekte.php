<?php

$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);

if($accessPw == "yes")
{
  $project = $_POST['projekte'];
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

  $additionalDir = $project;
  $defAdditionalDir = "..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$additionalDir;
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_kalender\\events\default";
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\";
  $defindetlink = "\\events\\".$additionalDir."\\index.html";


echo $deleteoption ." die option";


if(($deleteoption == 'default' || $deleteoption == '') && $project != "" &&$image)
{
  exec("xcopy ..\..\dashboard_appmenu\dashboard_appmenu_projekte\\events\default ..\..\dashboard_appmenu\dashboard_appmenu_projekte\\events\\".$additionalDir." /E /C /Q /i /Y");

  /*fügt die daten der Datenbank hinzu*/
  $pdo_insertTeamInformation = "INSERT INTO appmenu_projekte (Titel,ImgPath,ImgShow,IndexPath) VALUES (:t,:ip,:is,:inp)";

  $myfile = fopen("..\..\dashboard_appmenu\dashboard_appmenu_projekte\\events\\".$additionalDir."\\text\\titel.txt","w");
  fwrite($myfile,$additionalDir);
  fclose($myfile);

  /*Prepariert Eingabe der Kalendereinträge*/
  $pdo_stmt1 = $pdo_db_connection->prepare($pdo_insertTeamInformation);

  if($pdo_stmt1->execute(array('t'=>$project,'ip'=>$defDir,'is'=>$image,'inp'=>$defindetlink)))
  {
        echo "<script>location.href='manageprojekte.php';</script>";
  }
  else
  {

  }
}
else if($deleteoption != 'default')
{
  /*Löscht den gewählten Eintrag in der Datenbank damit er nicht merh angezeigt wird*/
  $pdo_deleteEntry = "DELETE FROM appmenu_projekte WHERE Titel ='".$deleteoption."'";
  echo $pdo_deleteEntry ." delete statemtnt";

  /*Prepaiert den Lösch-Befehl*/
  $pdo_stmt2 = $pdo_db_connection->prepare($pdo_deleteEntry);

  exec("rmdir /s /q ..\..\dashboard_appmenu\dashboard_appmenu_projekte\\events\\".$deleteoption ."");

  if($pdo_stmt2->execute())
  {
   echo "<script>location.href='manageprojekte.php';</script>";
  }

}

echo "<script>window.open('manageprojekte.php');</script>";

}
else {
  echo "<h1>FEHLER</h1><br /><h3>Die eingegebenen Daten waren nicht korrekt</h3><br /><a href = '../config.html'>Zum Login</a>";
}
 ?>
