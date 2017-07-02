<?php

$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);

if($accessPw == "yes")
{
  $groupName = $_POST['sitename'];
  $picinfos  = []
  $rawdate = $_POST['date'];
  $date = "";

  list($day,$month,$year) = explode(".",$rawdate);
  $date = $year.'-'.$month.'-'.$day;

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
  $defAdditionalDir = "..\..\dashboard_appmenu\dashboard_appmenu_galerie\\sites\\".$additionalDir;
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_galerie\\sites\default";
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_galerie\\sites\\";
  $defindetlink = "\\sites\\".$additionalDir."\\index.html";
  $mainPath = "sites\\".$additionalDir."\\index.html";


  $pdo_select = ("SELECT Titel from appmenu_kalender");
  $result = $pdo_db_connection->prepare($pdo_select);
  $result->execute();

echo $deleteoption ." die option";


if(($deleteoption == 'default' || $deleteoption == '') && $sitename != "" &&$date != "" &&$addition != "")
{


  /*Kopiert den Standardordner für einen Kalendereintrag*/
  exec("xcopy ..\..\dashboard_appmenu\dashboard_appmenu_galerie\sites\default ..\..\dashboard_appmenu\dashboard_appmenu\sites\\".$additionalDir." /E /C /Q /i /Y");

  /*Schreibt den Titel in die Datei*/
  $myfile = fopen("..\..\dashboard_appmenu\dashboard_appmenu_galery\sites\\".$additionalDir."\\text\\titel.txt","w");
  fwrite($myfile,$additionalDir);
  fclose($myfile);
  echo("..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$additionalDir."\\text\\titel.txt");

  /*fügt die daten der Datenbank hinzu*/
  $pdo_creatGroup= "INSERT INTO appmenu_galerie_gruppen (dirName,showName,Date) VALUES (:dn,sn,:d)";
  $pdo_insertImages "INSERT INTO appmenu_galerie_bilder (imgPath,showName,(SELECT ID from appmenu_galerie_gruppen WHERE showName = '" .$groupName."'))";

  /*Prepariert Eingabe der Kalendereinträge*/
  $pdo_stmt1 = $pdo_db_connection->prepare($pdo_creatGroup);

  if($pdo_stmt1->execute(array('dn'=>$mainPath,'titel'=>$groupName,'d'=>$date)))
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
