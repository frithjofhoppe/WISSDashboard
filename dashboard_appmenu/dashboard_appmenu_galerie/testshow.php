<?php
$pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard','wissdashboard','ccadmin14');
$q1 = "SELECT imgPath,showName from appmenu_galerie_bilder where groupID = 8";

$stm1 = $pdo_db_connection->prepare($q1);
$stm1->execute();
$linklocal = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
print "<html lang='de'>";
print "<head><meta charset='utf-8'/></head>";
foreach($stm1 as $result)
{
  print "<a href='". $linklocal. '' .$result['imgPath']. "'>" . $result['showName'] ."</a><br/>";
}
print "</html>";

?>
