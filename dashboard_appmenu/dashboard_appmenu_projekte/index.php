<html>
  <head>
    <meta charset ="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body>
    <div id = "header">
      <div id="img_head">
        <img src="pic/pic_team_head" class="head_img"/>
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
        <p class ="head_p" id="main_first_titel">

        </p>
        </div>
        <div id="main_second" class = "main_text">
          <p class="text_p" id="main_second_text1">


          </p>
        </div>
        <div id ="main_third" class = "main-picture">

          <?php
          $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
          $db_username = fgets($myfileUsername);

          $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
          $db_password = fgets($myfilePasswort);


          $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_username);
          $pdo_db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $pdo_db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $pdo_select = ("SELECT ID,Titel,ImgPath,ImgShow,IndexPath from appmenu_projekte");

          $result = $pdo_db_connection->prepare($pdo_select);
          $result->execute();

          $linklocal = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

          foreach ($result as  $row)
           {
             print "<a href = '" .$linklocal. $row['IndexPath'] ."'>";
             print "<div id='person_context_" . $row['ID'] ."' class='person_context'>";
             print  "<div ='pic_content_" . $row['ID'] . "' class='pic_context'>";
             print    "<img src='" . $row['ImgPath'] ."' class='pic_context_view'/>";
             print  "</div>";
             print "<div id='text_context_" . $row['ID'] . "' class='text_content'>";
             print  "<div id='text_context_" . $row['ID'] . "_name' class='text_content_entry'>";
             print  $row['Titel'];
             print  "</div>";
             print "</div>";
             print "</div>";
             print "</a>";
           }


          ?>

        </div>
        <div id ="main_4" class = "main_text">
          <p class="text_p" id="main_4_text1">

          </p>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
