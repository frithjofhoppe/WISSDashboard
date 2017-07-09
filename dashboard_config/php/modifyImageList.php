<?php

$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);


if($accessPw == "yes")
{

  $content = json_decode($_POST["mydata"],true);

  $content = str_replace("\\","",$content);

//  $groupName = $content['images'][0]['group'];
  //$folderName = $content["images"][0]['folder'];
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

//  $additionalDir = $folderName;
  $defAdditionalDir = "../../dashboard_appmenu/dashboard_appmenu_galerie/sites/view";
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_galerie\\sites\default";
  $defaultDir = "..\dashboard_appmenu\dashboard_appmenu_galerie\\sites\\";
/*  $defindetlink = "\\sites\\".$additionalDir."\\index.php";
  $mainPathSite = "sites\\".$additionalDir."\\index.php";
  $mainPathImages = "events\\".$additionalDir."\\".$actualImageName;*/

  $q2 = "UPDATE appmenu_galerie_gruppen SET Date = :d WHERE showName = :sN";
  $s2 = $pdo_db_connection->prepare($q2);
  if($s2->execute(array('d'=>$date,'sN'=>$content['images'][0]['description'])))
  {

  foreach($content["images"] as $var)
  {
    $q1 = "UPDATE appmenu_galerie_bilder SET showName = :sN WHERE ID = :id";
    $s1 = $pdo_db_connection->prepare($q1);
    if(!($s1->execute(array("sN"=>$var['description'],"id"=>$var['imgid']))))
    {
      $querrySuccessfull = false;
    }
  }
}
else
{
  $querrySuccessfull = false;
}
  echo json_encode(array('status'=>$querrySuccessfull));
}
?>
