<?php
  $password = $_GET['pw'];
  if($password = 'raspiwebserver')
  {
    shell_exec('sudo /sbin/shutdown -r now');
  }
?>
