<html>
  <head>
    <meta charset ="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body>
    <div id = "header">
      <div id="img_head">
        <img src="pic/cal1_mod2.jpg" class="head_img"/>
      </div>
    </div>
    <div id="sidebar">
      <div id ="sidebar_top">
        <div id="sidebar_logo">
          <img src="pic/logo.png" class="logo"/>
        </div>
      </div>
      <a href="../index.html">
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
        <div id ="main_content" class ="main_content">
          <div id="main_first" class = "main_header">
            <p class ="head_p">
              Unser Kalender
            </p>
          </div>
          <div id="main_second" class = "main_text">
        <!--   <p class="text_p"> -->
            <?php

            $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
            $db_username = fgets($myfileUsername);

            $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
            $db_password = fgets($myfilePasswort);

            $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);
            $pdo_db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo_db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo_select = ("SELECT Titel,DATE_FORMAT(Date,'%d.%m.%Y') Date,Link from appmenu_kalender order by Date ASC");

            $linklocal = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            $result = $pdo_db_connection->prepare($pdo_select);
            $result->execute();
             //echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
             //echo 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            foreach ($result as  $row)
             {
            print "<a href = '".$linklocal . $row['Link'] . "'  class =' eventoutputlink'>";
            print "<div id = 'event_" . $row['Titel'] . "'  class ='eventoutput' >";
            print "Thema:". $row['Titel'];
//print "<a href='". $linklocal. '' .$row['Link']. "' class ='eventoutput eventoutputlink'>Thema: " . $row['Titel'] ."</a>";
            print "<label class='eventoutputlabel'>Datum: ".$row["Date"]. "</label>";
            print "</div>";
            print "<a>";

              }

            ?>
          </div>

        </div>
    </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
