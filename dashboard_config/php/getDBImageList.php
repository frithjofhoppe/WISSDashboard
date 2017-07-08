<?php
$showName = $_POST['showname'];
//$dir = "../../dashboard_appmenu/dashboard_appmenu_galerie/events/".$d."/";

// Überprüft ob der angegebenen Dateiname ein Verzeichnis ist.

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
     foreach($stmt2 as $img)
     {
       /*print "<div id = '".$img."' class='float distance'>";
       print "<a href = 'pic/".$img."' target = '_blank'><img  class='order' src = 'pic/".$img."' alt = 'fail'/></a>";
       print "<label class = 'distance'>".$img."</label>";
       print "</div>";*/
      print"<div class='listobject'>";
      print "<div class='listobject_img'><label name='".$img['ID']."'>".$img['imgName']."</label></div>";
      print "<div class='listobject_input'><input class='listobject_input_text' type='text' id='txt_".$img['ID']." name='txt_".$img['ID']."'/></div>";
      print "</div>";


     }
    }
  }
   //print_r($images);
?>
