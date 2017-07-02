$(document).ready(function(){




  $('#main_head_buttoninput_button_create').click(function(){
    $('#enter').after().load("../html/manageGalerie_inputCreate.html");

  });



  $('#main_head_buttoninput_button_modify').click(function(){
    $("#main_head_buttoninput_input_btnAlter").remove();
    $('#main_workspace_content').remove();
    $('#main_workspace').remove();
    });


    $('body').on('focus', '#main_head_buttoninput_input_folder_textfield', function () {
      $('#main_workspace_content').remove();
      $('#main_workspace').remove();
    });

  $('body').on('blur', '#main_head_buttoninput_input_folder_textfield', function () {
    var text = $("#main_head_buttoninput_input_folder_textfield").val();
    $.post("getImageList.php",
        {
          dir: $("#main_head_buttoninput_input_folder_textfield").val()
        },
        function(data,status){
          $('#main_head').after("<div id='main_workspace'></div>");
          $('#main_workspace').append("<div id='main_workspace_describer'>");
          $('#main_workspace').append("<label id='main_workspace_describer_bild'>Bildname</label>");
          $('#main_workspace').append("<label id='main_workspace_describer_describer'>Bezeichner</label>");
          $('#main_workspace').append("</div><div id='main_workspace_content'></div> ");

           text = data;
           if(text !== "")
           {
            $(text).appendTo('#main_workspace_content');
            }
            else {
                $("Ordner nicht gefudnen!!").appendTo('#main_workspace_content');
            }
        });
  });

});
