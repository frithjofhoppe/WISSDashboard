<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="dashboard_main/css/index.css">
  </head>
  <body>
    <div id="main">
      <div id="slide">
        <div id ="slide_img_arround">
          <?php

          $myfileUsername = fopen("..\\..\\dashboardPassword\username.txt","r");
          $db_username = fgets($myfileUsername);

          $myfilePasswort = fopen("..\\..\\dashboardPassword\password.txt","r");
          $db_password = fgets($myfilePasswort);

          $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_username);
          $pdo_db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $pdo_db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $pdo_select = ("SELECT showName,imgLink,dirLink from main_pictures");

          $linklocal = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
          $result = $pdo_db_connection->prepare($pdo_select);
          $result->execute();
           //echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
           //echo 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
          foreach ($result as  $row)
           {
             print "<div id = 'event_" . $row['showName'] . "'>";
             print "<a href='". $linklocal. '' .$row['dirLink']. "'><img src='".$row['imgLink']."' class='slide' /></a>";
             print "</div>";
            }
          ?>

        </div>
      </div>
      <a href="dashboard_appmenu/index.html">
      <div id="appmenu">
        <div id="appmenu_middle">
          <div id="appmenu_middle_center">
            <div id="appmenu_middle_logo">
                <img src="dashboard_main/pic/pic_team_middle.svg" class="app"/>
            </div>
            <div id="appmenu_middle_txt">
              <p class="appmenu_middle_txt" id="appmenu_middle_txt_">
                Appmenü
              </p>
            </div>
          </div>
        </div>
      </div>
    </a>
    </div>
    <script src="dashboard_main/js/jquery-3.2.1.js"></script>
    <script src="dashboard_main/js/index.js"></script>
  </body>
</html>
