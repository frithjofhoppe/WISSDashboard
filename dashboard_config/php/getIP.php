<?php

  $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\ipraspi.txt","r");
  $ipadress = fgets($myfileUsername);

  echo $ipadress;
?>
