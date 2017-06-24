<?php

$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);

if($accessPw == "yes")
{
  $sitename = $_POST['sitename'];
  $date = $_POST['date'];
  $addition = $_POST['addition'];
  $deleteoption = $_POST['deleteoption'];

  $db_username = "xamp" ;
  $db_password = "xamp";

  $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
  $db_username = fgets($myfileUsername);

  $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
  $db_password = fgets($myfilePasswort);

  $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);

  $additionalDir = $sitename;
  $defAdditionalDir = "..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$additionalDir;
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_kalender\\events\default";
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\";
  $defindetlink = "\\events\\".$additionalDir."\\index.html";


  $pdo_select = ("SELECT Titel from appmenu_kalender");
  $result = $pdo_db_connection->prepare($pdo_select);
  $result->execute();

echo $deleteoption ." die option";


if(($deleteoption == 'default' || $deleteoption == '') && $sitename != "" &&$date != "" &&$addition != "")
{


  /*Kopiert den Standardordner für einen Kalendereintrag*/
  exec("xcopy ..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\default ..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$additionalDir." /E /C /Q /i /Y");

  /*Schreibt den Titel in die Datei*/
  $myfile = fopen("..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$additionalDir."\\text\\titel.txt","w");
  fwrite($myfile,$additionalDir);
  fclose($myfile);
  echo("..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$additionalDir."\\text\\titel.txt");

  /*fügt die daten der Datenbank hinzu*/
  $pdo_insertCalendarInformation = "INSERT INTO appmenu_kalender (WorkingDirectory,Titel,Addition,Date,Link) VALUES (:wd,:titel,:add,:day,:link)";

  /*Prepariert Eingabe der Kalendereinträge*/
  $pdo_stmt1 = $pdo_db_connection->prepare($pdo_insertCalendarInformation);

  if($pdo_stmt1->execute(array('wd'=>$defAdditionalDir,'titel'=>$sitename,'add'=>$addition,'day'=>$date,'link'=>$defindetlink)))
  {
        echo "<script>location.href='manage.php';</script>";
  }
  else
  {

  }
}
else if($deleteoption != 'default')
{
  /*Löscht den gewählten Eintrag in der Datenbank damit er nicht merh angezeigt wird*/
  $pdo_deleteEntry = "DELETE FROM appmenu_kalender WHERE Titel ='".$deleteoption."'";
  echo $pdo_deleteEntry ." delete statemtnt";

  /*Prepaiert den Lösch-Befehl*/
  $pdo_stmt2 = $pdo_db_connection->prepare($pdo_deleteEntry);

  exec("rmdir /s /q ..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$deleteoption ."");

  echo("rmdir /s /q ..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$deleteoption ."");

  if($pdo_stmt2->execute())
  {
    echo "<script>location.href='manage.php';</script>";
  }

}

echo "<script>window.open('manage.php');</script>";

}
else {
  echo "<h1>FEHLER</h1><br /><h3>Die eingegebenen Daten waren nicht korrekt</h3><br /><a href = '../config.html'>Zum Login</a>";
}
 ?>
