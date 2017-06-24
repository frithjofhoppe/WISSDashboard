<html>
<head>

</head>
<body>

<?php
$myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
$accessPw = fgets($myfilePw);
fclose($myfilePw);

if($accessPw == "yes")
{

  echo"<script>alert('Beachten sie das ihre Session aus Sicherheitsgründen nach dem veralssen beendet wird')</script>";
  $foo = true;
  include('manage.php');
}
else
{
    echo "<h1>FEHLER</h1><br /><h3>Die eingegebenen Daten waren nicht korrekt</h3><br /><a href = '../config.html'>Zum Login</a>";
}
?>



 <script src="../js/jquery-3.2.1.js"></script>
 <script src="../js/index.js"></script>
</body>
</html>
