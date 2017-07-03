<html lang='de'>
 <head>
   <meta charset='utf-8'/>
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


   $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard','wissdashboard','ccadmin14');
   $q1 = "SELECT imgPath,showName from appmenu_galerie_bilder where groupID = 8";

   $stm1 = $pdo_db_connection->prepare($q1);
   $stm1->execute();
   $linklocal = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);


  // Überprüft ob der angegebenen Dateiname ein Verzeichnis ist.
  /* if (is_dir($dir)) {
  //Öffnet das angegebene Verzeichnis
    if ($dh = opendir($dir)) {
        $images = array();

        while (($file = readdir($dh)) !== false) {
            if (!is_dir($dir.$file)) {
                $images[] = $file;
            }
        }

        closedir($dh);
*/
        foreach($stm1 as $img)
        {
          print "<div id = '".$img['imgPath']."' class='float distance'>";
          print "<a href = '".$linklocal.''.$img['imgPath']."' ><img  class='order' src = '".$linklocal.''.$img['imgPath']."' alt = 'fail'/></a>";
          print "<label class = 'distance'>".$img['showName']."</label>";
          print "</div>";
        }

      //print_r($images);
   ?>
 </div>
 </body>
</html>
