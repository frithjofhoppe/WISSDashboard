<?php
$showName = $_POST['showname'];
//$dir = "../../dashboard_appmenu/dashboard_appmenu_galerie/events/".$d."/";

// Überprüft ob der angegebenen Dateiname ein Verzeichnis ist.

  $returnObject = array();

  $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
  $db_username = fgets($myfileUsername);

  $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
  $db_password = fgets($myfilePasswort);

  $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);
  $query1 = "SELECT ID FROM appmenu_galerie_gruppen WHERE showName =:sN";
  $stmt1 = $pdo_db_connection->prepare($query1);

  $query2 = "SELECT ID,imgName,showName FROM appmenu_galerie_bilder WHERE groupID = :id";
  $stmt2 = $pdo_db_connection->prepare($query2);
  if($stmt1->execute(array("sN"=>$showName)))
  {
  $result = $stmt1->fetch(PDO::FETCH_ASSOC);
    if($stmt2->execute(array("id"=>$result['ID'])))
    {
    $counter = 0;
     foreach($stmt2 as $img)
     {
        //echo json_encode($img['showName']);
        $return[$counter] = $img['showName'];
        $counter++;
     }
     echo json_encode($return);
    }
  }
   //print_r($images);
?>
