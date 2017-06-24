<?php
$pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard','xamp','xamp');
$pdo_db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo_db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo_select = ("SELECT Titel,Link from appmenu_kalender");

$linklocal = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
$result = $pdo_db_connection->prepare($pdo_select);
$result->execute();
 //echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 //echo 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
foreach ($result as  $row)
 {
print "<a href='". $linklocal. '' .$row['Link']. "'>" . $row['Titel'] ."</a><br/>";
  }
/*    foreach ($usersCached as $row) {
      print $row["name"] . "-" . $row["sex"] ."<br/>";
}*/

?>
