$(document).ready(function(){

  $('#main_head_buttoninput_button_create').click(function(){
    $('#enter').after().load("../html/manageGalerie_inputCreate.html");
    /*$.ajax({
    type: 'GET',
    url: '../html/manageGalerie_inputCreate.html',
    success: function (file_html) {
        // success
        words = file_html;
        $(words).insertAfter("#main_head_buttoninput_button_create");
    }
  });*/
  });

  $('#main_head_buttoninput_input_folder_textfield').click(function(){

  });

  $('#main_head_buttoninput_button_modify').click(function(){
    $("#main_head_buttoninput_input_btnAlter").remove();
    });



  $('body').on('blur', '#main_head_buttoninput_input_folder_textfield', function () {
    var text = $("#main_head_buttoninput_input_folder_textfield").val();
    $.post("getImageList.php",
        {
          dir: $("#main_head_buttoninput_input_folder_textfield").val()
        },
        function(data,status){
           text = data;
            $(text).appendTo('#main_workspace');
        });
  });

});
