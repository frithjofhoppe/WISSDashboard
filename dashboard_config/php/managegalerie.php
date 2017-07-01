<html>
  <head>
    <meta charset ="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/indexgalerie.css">
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
      <div id="main_head">
        <div id="main_head_titel" >
          <label class="titel">Galerie</label>
        </div>
        <div id ="main_head_buttoninput">
          <div id="main_head_buttoninput_button">
            <div id="main_head_buttoninput_button_create" class="float align">
              <button id="create" class="head" name="create">Erstellen</button>
            </div>
            <div id="main_head_buttoninput_button_modify" class="float align">
              <button id="modify" class="head" name="modify"/>Bearbeiten</button>
            </div>
            <div id="main_head_buttoninput_button_remove" class="float align">
              <button id="remove" class="head" name="remove"/>Entfernen</button>
            </div>
          </div>

          <div id="main_head_buttoninput_input_btnAlter">
           <div id="input1" class="verticallist">
            <div id="main_head_buttoninput_input_label_folder" class="inline">
              <label type="text" placeholder="Relativer Ordnerpfad" id="main_head_buttoninput_input_label_folder_txt" name="alter">Ordnername</label>
            </div>
            <div id="main_head_buttoninput_input_folder" class="inline">
              <input id="main_head_buttoninput_input_folder_textfield" name="alter"/>
            </div>
           </div>
           <div id="input2" class="verticallist">
             <div id="main_head_buttoninput_input_label_date" class="inline">
               <label type="text" placeholder="Relativer Ordnerpfad" id="main_head_buttoninput_input_label_date_txt" name="alter">Datum</label>
             </div>
             <div id="main_head_buttoninput_input_date" class="inline">
               <input id="main_head_buttoninput_input_date_textfield" name="alter"/>
             </div>
            </div>
            <div id="input3" class="verticallist">
              <div id="main_head_buttoninput_input_label_description" class="inline">
                <label type="text" placeholder="Relativer Ordnerpfad" id="main_head_buttoninput_input_label_description_txt" name="alter">Anzeigename</label>
              </div>
              <div id="main_head_buttoninput_input_description" class="inline">
                <input id="main_head_buttoninput_input_description_textfield" name="alter"/>
              </div>
             </div>
           </div>
          </div>
        </div>
      <div id="main_workspace">
      </div>
    </div>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/managegalerie.js"></script>
  </body>
</html>
