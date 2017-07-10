<html>
  <head>
    <meta charset ="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body>
    <div id = "header">
      <div id="img_head">
        <img src="pic/galerie3_v1.jpg" class="head_img"/>
      </div>
    </div>
    <div id="sidebar">
      <div id ="sidebar_top">
        <div id="sidebar_logo">
          <img src="pic/logo.png" class="logo"/>
        </div>
      </div>
      <a href="../../../index.html">
      <div id="sidebar_middle">
        <div id="sidebar_middle_center">
          <div id="sidebar_middle_logo">
              <img src="pic/pic_team_middle.svg" class="app"/>
          </div>
          <div id="sidebar_middle_txt">
            <p class="sidebar_middle_txt" >
              Appmenü
            </p>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div id = "main">
      <?php
      $dir = "events/testfolder/";

      $groupID = $_GET['group'];

      $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard','wissdashboard','ccadmin14');
      $q1 = "SELECT imgPath,showName from appmenu_galerie_bilder where groupID = :gI";

      $stm1 = $pdo_db_connection->prepare($q1);
      $stm1->execute(array("gI"=>$groupID));
      $linklocal = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

      foreach($stm1 as $img)
           {
             print "<div id = '".$img['imgPath']."' class='float distance zoompic'>";
             print "<a href = '".$linklocal.'/'.$img['imgPath']."' ><img  class='order' src = '".$linklocal.'/'.$img['imgPath']."' alt = 'fail'/></a>";
             print "<label class = 'distance'>".$img['showName']."</label>";
             print "</div>";
           }
           ?>
    </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
