  <?php
  $myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
  $accessPw = fgets($myfilePw);
  fclose($myfilePw);

  if($accessPw = "yes")
  {

    $groupID = $_POST['groupid'];

    $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
    $db_username = fgets($myfileUsername);

    $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
    $db_password = fgets($myfilePasswort);



    $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);
    $q1 = "DELETE FROM appmenu_galerie_gruppen WHERE ID = :gI";
    $s1 = $pdo_db_connection->prepare($q1);

    if($s1->execute(array('gI'=>$groupID)))
    {

      echo "Daten wurden erfolgreich gelöcht";
    }
  }
  ?>
