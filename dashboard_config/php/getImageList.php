<?php
$d = $_POST['dir'];
$dir = "../../dashboard_appmenu/dashboard_appmenu_galerie/events/".$d."/";

// Überprüft ob der angegebenen Dateiname ein Verzeichnis ist.
if (is_dir($dir)) {
//Öffnet das angegebene Verzeichnis
 if ($dh = opendir($dir)) {
     $images = array();

     while (($file = readdir($dh)) !== false) {
         if (!is_dir($dir.$file)) {
             $images[] = $file;
         }
     }

     closedir($dh);


     foreach($images as $img)
     {
       /*print "<div id = '".$img."' class='float distance'>";
       print "<a href = 'pic/".$img."' target = '_blank'><img  class='order' src = 'pic/".$img."' alt = 'fail'/></a>";
       print "<label class = 'distance'>".$img."</label>";
       print "</div>";*/
      print "<label>".$img."</label>";
      print "<br>";

     }

   //print_r($images);
 }
}
