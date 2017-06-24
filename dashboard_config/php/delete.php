<?php
  SESSION_START();
  SESSION_DESTROY();

  $myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","w");
  fwrite($myfilePw,"no");
  fclose($myfilePw);

  echo "<script>location.href='../config.html';</script>";
?>
