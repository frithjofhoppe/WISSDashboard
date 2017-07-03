<?php

  $content = json_decode($_POST["mydata"],true);

  $content = str_replace("\\","",$content);

  $groupName = $content["images"][0]["group"];

  $fp = fopen('D:\Programme\Xampp\htdocs\dashboard\dashboard_appmenu\dashboard_appmenu_galerie\sites\output.txt','w');


  foreach($content["images"] as $var)
  {
  //  echo $var["name"];
    fwrite($fp,$var["name"]);
    fwrite($fp,$var["date"]);
    fwrite($fp,$groupName);
    fwrite($fp,$var["folder"]);
    fwrite($fp,$var["description"]);

  }
  fclose($fp);

?>
