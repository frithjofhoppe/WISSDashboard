<?php

$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);


if($accessPw == "yes")
{

  $content = json_decode($_POST["mydata"],true);

  $content = str_replace("\\","",$content);

  $groupName = $content['images'][0]['group'];
  $folderName = $content["images"][0]['folder'];
  $rawdate = $content["images"][0]['date'];

  $actualImageName = "";
  $querrySuccessfull = true;

  list($day,$month,$year) = explode(".",$rawdate);
  $date = $year.'-'.$month.'-'.$day;

/*  $addition = $_POST['addition'];
  $deleteoption = $_POST['deleteoption'];*/

  $db_username = "xamp" ;
  $db_password = "xamp";

  $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
  $db_username = fgets($myfileUsername);

  $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
  $db_password = fgets($myfilePasswort);

  $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);

  $additionalDir = $folderName;
  $defAdditionalDir = "../../dashboard_appmenu/dashboard_appmenu_galerie/sites/view";
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_galerie\\sites\default";
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_galerie\\sites\\";
  $defindetlink = "\\sites\\".$additionalDir."\\index.php";
  $mainPathSite = "sites\\".$additionalDir."\\index.php";
  $mainPathImages = "events\\".$additionalDir."\\".$actualImageName;



  /*$pdo_select = ("SELECT Titel from appmenu_kalender");
  $result = $pdo_db_connection->prepare($pdo_select);
  $result->execute();*/

echo $deleteoption ." die option";
echo $content["images"][0]["folder"] . " gewählter ordner";
//$content["images"][0]["folder"] != '' && $content["images"][0]["folder"] != '' && $content["images"][0]["date"] != ''
if(true)
{


  /*Kopiert den Standardordner für einen Kalendereintrag*/
  //xexec("xcopy ..\..\dashboard_appmenu\dashboard_appmenu_galerie\sites\default ..\..\dashboard_appmenu\dashboard_appmenu_galerie\sites\\".$additionalDir." /E /C /Q /i /Y");

  //Schreibt den Titel in die Datei
/*  $myfile = fopen("..\..\dashboard_appmenu\dashboard_appmenu_galerie\sites\\".$additionalDir."\\text\\titel.txt","w");
  fwrite($myfile,$additionalDir);
  fclose($myfile);
  echo("..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$additionalDir."\\text\\titel.txt");*/
/*
  /*fügt die daten der Datenbank hinzu*/
  $pdo_createGroup= "INSERT INTO appmenu_galerie_gruppen (dirName,showName,Date,indexPath) VALUES (:dn,:sn,:d,:ip)";
  //$pdo_insertImages "INSERT INTO appmenu_galerie_bilder (imgPath,showName,(SELECT ID from appmenu_galerie_gruppen WHERE showName = '" .$groupName."'))";

  /*Prepariert Eingabe der Kalendereinträge*/
  $pdo_stmt1 = $pdo_db_connection->prepare($pdo_createGroup);

  if($pdo_stmt1->execute(array('dn'=>$defAdditionalDir,'sn'=>$groupName,'d'=>$date,'ip'=>$mainPathSite)))
  {
        foreach($content["images"] as $var)
        {
          $actualImageName = $var["name"];
          $imgPath = "../../events/".$additionalDir."/".$actualImageName;

          $pdo_insertEachImages =  "INSERT INTO appmenu_galerie_bilder (imgPath,showName,groupID,imgName) values (:ip,:sN,(SELECT ID from appmenu_galerie_gruppen WHERE showName = :gN),:imgName)";
          $pdo_stm3 = $pdo_db_connection->prepare($pdo_insertEachImages);
          if($pdo_stm3->execute(array('ip'=>$imgPath,'sN'=>$var["description"],'gN'=>$groupName,"imgName"=>$actualImageName)))
          {

          }
          else
          {
            $querrySuccessfull = false;
          }

        }

        if($querrySuccessfull)
        {
          echo "<script>location.href='managegalerie.php';</script>";
        }
  }
  else
  {

  }
}
else if($deleteoption != 'default')
{ /*Löscht den gewählten Eintrag in der Datenbank damit er nicht merh angezeigt wird*/
  $pdo_deleteEntry = "DELETE FROM appmenu_kalender WHERE Titel ='".$deleteoption."'";
  echo $pdo_deleteEntry ." delete statemtnt";



  /*Prepaiert den Lösch-Befehl*/
  $pdo_stmt2 = $pdo_db_connection->prepare($pdo_deleteEntry);
/*
  exec("rmdir /s /q ..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$deleteoption ."");

  echo("rmdir /s /q ..\..\dashboard_appmenu\dashboard_appmenu_kalender\\events\\".$deleteoption ."");

  if($pdo_stmt2->execute())
  {
    echo "<script>location.href='manage.php';</script>";
  }
*/
}
else
{
  echo "<script>location.href='https://www.google.ch';</script>";
}

//echo "<script>window.open('manage.php');</script>";

}
else {
  echo "<h1>FEHLER</h1><br /><h3>Die eingegebenen Daten waren nicht korrekt</h3><br /><a href = '../config.html'>Zum Login</a>";
}
 ?>
