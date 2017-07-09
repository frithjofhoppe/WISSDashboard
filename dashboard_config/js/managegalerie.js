$(document).ready(function(){

  //var phpContent = {"images":[{'name':"dog.jpg","group":"home"},{"name":"cat.jpg","group":"outdoor"},{"name":"bird.jpg","group":"sky"}]};
  var phpContent = {'images':[]};
  var isFirstTime = true;




  $('#main_head_buttoninput_button_create').click(function(){
    console.log("main_head_buttoninput_button_create");

    $('#enter').after().load("../html/manageGalerie_inputCreate.html");
    $('#main_workspace_content').remove();
    $('#main_workspace').remove();
    $('#modify').css('background-color',"buttonface");
    $('#create').css('background-color','gray');
    $('#remove').css('background-color',"buttonface");

  });

  $('#main_head_buttoninput_button_modify').click(function(){
    console.log("main_head_buttoninput_button_modify");

    $('#modify').css('background-color','gray');
    $('#create').css('background-color','buttonface');
    $('#remove').css('background-color','buttonface');
    $("#main_head_buttoninput_input_btnAlter").remove();
    $('#main_workspace_content').remove();
    $('#main_workspace').remove();
    $('#enter').after().load("../html/manageGalerie_inputModify.html");
    });

    $('body').on('focus', '#main_head_buttonmodify_modify_description_textfield', function () {
      $('#main_head_buttonmodify_modify_date_textfield').val('');
      $('#main_workspace_content').remove();
      $('#main_workspace').remove();
    });

    $('body').on('blur', '#main_head_buttonmodify_modify_description_textfield', function () {
      console.log("main_head_buttonmodify_modify_description_textfield");
      var wert =  $('#main_head_buttonmodify_modify_description_textfield').val();
      if(wert !== "")
      {
      var out = "";
      $.post('getDBImageList.php',
        {
          "showname": wert
        },
        function(data,status)
        {
          $('#main_head').after("<div id='main_workspace'></div>");
          $('#main_workspace').append("<div id='main_workspace_describer'>");
          $('#main_workspace').append("<label id='main_workspace_describer_bild'>Bildname</label>");
          $('#main_workspace').append("<label id='main_workspace_describer_describer'>Bezeichner</label>");
          $('#main_workspace').append("</div><div id='main_workspace_content'></div> ");
          $('#main_workspace').append("<div id='main_workspace_btnSave' class='endalign'>");
          $('#main_workspace').append("<button id='save_modify' class='head' name='save'>Speichern</button></div>");
          out = data;
          $(out).appendTo('#main_workspace_content');
          window.alert("Die Daten wurden übertragen");

          $.ajax({
            url:"getDBImageValue.php",
            type:"POST",
            data:{showname:$('#main_head_buttonmodify_modify_description_textfield').val()},
            success:function(result){
              var data = jQuery.parseJSON(result);
              var count = 1;
              $('#main_head_buttonmodify_modify_date_textfield').val(data[0]);
              $(".listobject").each(function(){
                var $img = $(this).children().first().children().html();
                var $imgtext = $(this).children().last().children().first();
                $imgtext.val(data[count]);
                count++;
              });
            }
          });
        }
      );
      }
    });


    $('body').on('focus', '#main_head_buttoninput_input_folder_textfield', function () {
      console.log("main_head_buttoninput_input_folder_textfield");
      $('#main_workspace_content').remove();
      $('#main_workspace').remove();
    });

  $('body').on('blur', '#main_head_buttoninput_input_folder_textfield', function () {
    console.log("main_head_buttoninput_input_folder_textfield");
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
          $('#main_workspace').append("<div id='main_workspace_btnSave' class='endalign'>");
          $('#main_workspace').append("<button id='save' class='head' name='save'>Speichern</button></div>");

          text = data;

          $(text).appendTo('#main_workspace_content');

        });
  });

  function entry(name,value,group)
  {
    this.name = name;
    this.value = value;
    this.group = group;
  }

  $('body').on('click','#save',function(){
    console.log("save");
    var listobjectlength =  $('.listobject').length;
    var date = $('#main_head_buttoninput_input_date_textfield').val();
    var group = $('#main_head_buttoninput_input_description_textfield').val();
    var folder = $('#main_head_buttoninput_input_folder_textfield').val();

    $('.listobject').each(function(index){
      var img = $(this).children().first().children().html();
      var imgtext = $(this).children().last().children().val();
      phpContent.images.push({"name":img,"description":imgtext,"group":group,"date":date,"folder":folder});
    });

  //  window.alert(phpContent);
    $.ajax({
      type:'POST',
      url:'createImageList.php',
      data:{mydata:JSON.stringify(phpContent)},
      success:function()
      {
        window.alert("Die Daten wurden übertragen");
      }
    });
    window.alert("Daten wruden erfasst");
    window.location.reload(true);

  });

  $('body').on('click','#save_modify',function(){
    var date = $('#main_head_buttonmodify_modify_date_textfield').val();
    var groupshowname = $('#main_head_buttonmodify_modify_description_textfield').val();
    //var folder = $('#main_head_buttoninput_input_folder_textfield').val();

  var modifyContent = {'images':[]};

  $('.listobject').each(function(index){
    var img = $(this).children().first().children().html();
    var imgtext = $(this).children().last().children().val();
    var imgID = $(this).children().first().children().first().attr('name');
    modifyContent.images.push({"name":img,"description":imgtext,"imgid":imgID,"date":date,"groupShowName":groupshowname});
  });
  phpContent = modifyContent;

  $.ajax({
    type:'POST',
    url:'modifyImageList.php',
    data:{mydata:JSON.stringify(phpContent)},
    success:function(data)
    {

      //window.alert(data.status + " aktueller data Status");
      if(data.status == true)
      {
        window.alert("Änderungen wruden erfolgreich übernommen");
      }
      else if(data.status == false)
      {
        window.alert("Es trat ein Problem bei der Verarbeitung auf");
      }

      $('.inline').each(function(){
        $(this).children().first().val('');
      });

      $('.listobject').each(function(){
        $(this).children().last().children().val('>gespeichert');
      });
      window.alert("Daten wruden geändert");
      window.location.reload(true);

    }
  });



  });
});
