<html>
 <head>
   <style>
   img
   {
     width:100%;
     height:auto;
   }

   #main
   {

   }

   .float
   {
     width:22vw;
     height:22vw;
     float:left;
   }

   div.distance
   {
     margin:3%;
   }

   label.distance
   {
     font-size:1.5vw;
     font-family:'Segoe UI light';
     position:relative;
     top:2%;
   }

   </style>
 </head>
 <body>
   <div id="main">
   <?php
   $dir = "events/testfolder/";

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
          print "<div id = '".$img."' class='float distance'>";
          print "<a href = 'pic/".$img."' target = '_blank'><img  class='order' src = 'pic/".$img."' alt = 'fail'/></a>";
          print "<label class = 'distance'>".$img."</label>";
          print "</div>";
        }

      //print_r($images);
    }
   }
   ?>
 </div>
 </body>
</html>
