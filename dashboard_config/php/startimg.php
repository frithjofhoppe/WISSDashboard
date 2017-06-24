<?php

$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);

if($accessPw == "yes")
{

  $sitename = $_POST['sitename'];
  $imgname = $_POST['imgname'];
  $deleteoption = $_POST['deleteoption'];

  $db_username = 'xamp';
  $db_password = 'xamp';

  $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);

  $additionalDir = $sitename;
  $imgLink = "dashboard_main\\pic\\".$imgname;
  $defAdditionalDir = "\dashboard_appmenu\dashboard_appmenu_startseiten\\".$additionalDir."\\index.html";
//  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_kalender\\events\default";
  //$defaultDir = "..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\";
  $defindetlink = "\\".$additionalDir."\\index.html";


/*  $pdo_select = ("SELECT Titel from appmenu_kalender");
  $result = $pdo_db_connection->prepare($pdo_select);
  $result->execute();*/

echo $deleteoption ." die option";


if(($deleteoption == 'default' || $deleteoption == '') && $sitename != "" &&$imgname != "")
{
  /*Kopiert den Standardordner für einen Startbildschirmeintrag*/
  exec("xcopy ..\..\dashboard_appmenu\dashboard_appmenu_startseiten\default ..\..\dashboard_appmenu\dashboard_appmenu_startseiten\\".$additionalDir." /E /C /Q /i /Y");

  /*Schreibt den Titel in die Datei*/
  $myfile = fopen("..\..\dashboard_appmenu\dashboard_appmenu_startseiten\\".$additionalDir."\\text\\titel.txt","w");
  fwrite($myfile,$additionalDir);
  fclose($myfile);
  echo("..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$additionalDir."\\text\\titel.txt");

  /*fügt die daten der Datenbank hinzu*/
  $pdo_insertCalendarInformation = "INSERT INTO main_pictures (showName,dirLink,imgLink) VALUES (:sN,:dL,:iL)";

  /*Prepariert Eingabe der Startbildschirmeinträge*/
  $pdo_stmt1 = $pdo_db_connection->prepare($pdo_insertCalendarInformation);

  if($pdo_stmt1->execute(array('sN'=>$sitename,'dL'=>$defAdditionalDir,'iL'=>$imgLink)))
  {

    echo "<script>location.href='manageimg.php';</script>";
  }
  else
  {

  }
}
else if($deleteoption != 'default')
{
  /*Löscht den gewählten Eintrag in der Datenbank damit er nicht merh angezeigt wird*/
  $pdo_deleteEntry = "DELETE FROM main_pictures WHERE showName ='".$deleteoption."'";
  echo $pdo_deleteEntry ." delete statemtnt";

  /*Prepaiert den Lösch-Befehl*/
  $pdo_stmt2 = $pdo_db_connection->prepare($pdo_deleteEntry);

  exec("rmdir /s /q ..\..\dashboard_appmenu\dashboard_appmenu_startseiten\\".$deleteoption ."");

  echo("rmdir /s /q ..\..\dashboard_appmenu\dashboard_appmenu_startseiten\\".$deleteoption ."");

  if($pdo_stmt2->execute())
  {
     echo "<script>location.href='manageimg.php';</script>";
  }

}

//echo "<script>window.open('manageimg.php');</script>";
}
else
{
    echo "<script>location.href='failaccess.html';</script>";
}


?>
