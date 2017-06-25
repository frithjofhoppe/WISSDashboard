<?php

$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);

if($accessPw == "yes")
{
  $description = $_POST['description'];
  $titel = $_POST['titel'];
  $image = $_POST['bild'];
  $deleteoption = $_POST['deleteoption'];

  $db_username = "xamp" ;
  $db_password = "xamp";

  $additionalDir = $titel;
  $defDir = "pic\\" . $image;
  $defindetlink = "\\events\\".$additionalDir."\\index.html";

  $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
  $db_username = fgets($myfileUsername);

  $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
  $db_password = fgets($myfilePasswort);


  $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);

echo $deleteoption ." die option";


if(($deleteoption == 'default' || $deleteoption == '') && $titel != "" &&$description != "" && $image != "")
{

  exec("xcopy ..\..\dashboard_appmenu\dashboard_appmenu_umgebung\\events\default ..\..\dashboard_appmenu\dashboard_appmenu_umgebung\\events\\".$additionalDir." /E /C /Q /i /Y");

  $myfile = fopen("..\..\dashboard_appmenu\dashboard_appmenu_umgebung\\events\\".$additionalDir."\\text\\titel.txt","w");
  fwrite($myfile,$additionalDir);
  fclose($myfile);

  /*fügt die daten der Datenbank hinzu*/
  $pdo_insertTeamInformation = "INSERT INTO appmenu_umgebung (Titel,SubTitel,IndexPath,ImgPath,ImgShowName) VALUES (:t,:st,:inp,:imp,:imsn)";

  /*Prepariert Eingabe der Kalendereinträge*/
  $pdo_stmt1 = $pdo_db_connection->prepare($pdo_insertTeamInformation);

  if($pdo_stmt1->execute(array('t'=>$titel,'st'=>$description,'inp'=>$defindetlink,'imp'=>$defDir,'imsn'=>$image)))
  {
        echo "<script>location.href='manageumgebung.php';</script>";
  }
  else
  {

  }
}
else if($deleteoption != 'default')
{

  exec("rmdir /s /q ..\..\dashboard_appmenu\dashboard_appmenu_umgebung\\events\\".$deleteoption ."");

  /*Löscht den gewählten Eintrag in der Datenbank damit er nicht merh angezeigt wird*/
  $pdo_deleteEntry = "DELETE FROM appmenu_umgebung WHERE Titel ='".$deleteoption."'";
  echo $pdo_deleteEntry ." delete statemtnt";

  /*Prepaiert den Lösch-Befehl*/
  $pdo_stmt2 = $pdo_db_connection->prepare($pdo_deleteEntry);

  if($pdo_stmt2->execute())
  {
   echo "<script>location.href='manageumgebung.php';</script>";
  }

}

echo "<script>window.open('manageumgebung.php');</script>";

}
else {
  echo "<h1>FEHLER</h1><br /><h3>Die eingegebenen Daten waren nicht korrekt</h3><br /><a href = '../config.html'>Zum Login</a>";
}
 ?>
