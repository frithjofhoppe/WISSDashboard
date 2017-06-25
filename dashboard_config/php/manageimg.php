<html>
  <head>
    <meta charset ="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/indeximg.css">
  </head>
  <body>
    <div id = "header">
      <div id="txt_head">
        Einstellungen
      </div>
    </div>
    <div id="sidebar">
      <div id ="sidebar_top">
        <div id="sidebar_logo">

        </div>
      </div>
      <div id="sidebar_middle">
        <div id="sidebar_middle_center">
          <div id="sidebar_middle_logo">
              <img src="../pic/settings.svg" class="app"/>
          </div>
          <div id="sidebar_middle_txt">
            <a href="manageimg.php" class="sidebar_a_pages">
              <div id="sidebare_middle_text_link1" class ="sidebare_middle_text_link">
                <p class="sidebar_middle_txt" >
                  Bilder
                </p>
              </div>
            </a>
            <a href="manage.php" class="sidebar_a_pages">
              <div id="sidebare_middle_text_link2" class ="sidebare_middle_text_link">
                <p class="sidebar_middle_txt" >
                  Kalender
                </p>
              </div>
            </a>
            <a href="manageteam.php" class="sidebar_a_pages">
              <div id="sidebare_middle_text_link3" class ="sidebare_middle_text_link">
                <p class="sidebar_middle_txt" >
                  Team
                </p>
              </div>
            </a>
            <a href="managegalerie.php" class="sidebar_a_pages">
              <div id="sidebare_middle_text_link4" class ="sidebare_middle_text_link">
                <p class="sidebar_middle_txt" >
                  Galerie
                </p>
              </div>
            </a>
            <a href="managelernen.php" class="sidebar_a_pages">
              <div id="sidebare_middle_text_link5" class ="sidebare_middle_text_link">
                <p class="sidebar_middle_txt" >
                  Lernen
                </p>
              </div>
            </a>
            <a href="manageumgebung.php" class="sidebar_a_pages">
              <div id="sidebare_middle_text_link6" class ="sidebare_middle_text_link">
                <p class="sidebar_middle_txt" >
                  Umgebung
                </p>
              </div>
            </a>
            <a href="manageprojekte.php" class="sidebar_a_pages">
              <div id="sidebare_middle_text_link7" class ="sidebare_middle_text_link">
                <p class="sidebar_middle_txt" >
                  Projekte
                </p>
              </div>
            </a>
            <a href="delete.php" class="sidebar_a_pages">
              <div id="sidebare_middle_text_link8" class ="sidebare_middle_text_link">
                <p class="sidebar_middle_txt" >
                  Logout
                </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id = "main">
      <div id ="main_content" class ="main_content">
        <div id="main_first" class = "main_header">
        <p class ="head_p">
          Neues Startbild erstellen
        </p>
        </div>
        <div id="main_second" class = "main_text">
          <div id ="formular">
            <form action="startimg.php" method="post">
            <div id="seitenname" class="formdiv">
            <label class="lblformular">Seitenname</label>  <input type="text" name="sitename" class="formfelder"/>
            </div>
            <div id="seitendatum" class="formdiv">
              <label class="lblformular">Bildname</label> <input type="text" name="imgname" class="formfelder"/>
            </div>
          <!--  <div id="seitenhinweis" class="formdiv">
              <label class="lblformular">Hinweis</label> <input type="text" name = "addition" class="formfelder"/>
            </div> -->
            <div id="seitenbutton" class="formdiv">
              <input type="submit" class="formfelder"/>
            </div>
            </form>
          </div>
        </div>
        <div id="main_second_titel">
          <p class ="main_p">
            Startbild entfernen
          </p>
        </div>
        </div>
        <div id="main_four" class = "main_text">
          <div id="formulardelete">
            <form action="startimg.php" method="post">
              <div id="feldseitedelete" class="formdiv" >
                <select class="formfelder" name="deleteoption">


                  <option value="default" selected="selected">Auswahl</option>
                  <?php

                  $myfilePw = fopen("..\\..\\..\\..\\dashboardPassword\access.txt","r");
                  $accessPw = fgets($myfilePw);
                  fclose($myfilePw);

                  $myfileUsername = fopen("..\\..\\..\\..\\dashboardPassword\username.txt","r");
                  $db_username = fgets($myfileUsername);

                  $myfilePasswort = fopen("..\\..\\..\\..\\dashboardPassword\password.txt","r");
                  $db_password = fgets($myfilePasswort);

                  if($accessPw == "yes")
                  {

                  $pdo_db_connection = new PDO('mysql:host=localhost;dbname=dashboard',$db_username,$db_password);
                  $pdo_db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $pdo_db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                  $pdo_select = ("SELECT showName from main_pictures");

                  $linklocal = '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                  $result = $pdo_db_connection->prepare($pdo_select);
                  $result->execute();
                   //echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                   //echo 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                  foreach ($result as  $row)
                   {
                      print "<option value='". $row['showName']. "'>" . $row['showName'] ."</option>";
                   }
                 }
                 else
                 {
                    echo "<script>location.href='failaccess.html';</script>";
                 }
                  ?>
                </select>
                  <!-- <label class="lblformular">Zu entfernende Seite</label><input type="text" class="formfelder" name="deletesite" /> -->
              </div>
              <div id="deletebutton" class="formdiv">
              <input type="submit" name="deletebutton" class="formfelder"/>
              </div>
            </form>
          </div>
        </div>
        <div id ="main_third" class = "main-picture">
          <!-- <img src="pic/pic1.png" class="content_picture"/> -->
        </div>
        <div id ="main_4" class = "main_text">
          <p class="text_p">


          </p>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
