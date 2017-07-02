$(document).ready(function(){

  //var phpContent = {"images":[{'name':"dog.jpg","group":"home"},{"name":"cat.jpg","group":"outdoor"},{"name":"bird.jpg","group":"sky"}]};
  var phpContent = {'images':[{'name':'dog.jpg','group':'home'},{'name':'cat.jpg','group':'outdoor'},{'name':'bord.jpg','group':'sky'}]};
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

    var listobjectlength =  $('.listobject').length;
    /*phpContent.push("{name:'group',value:'" .$groupName"'}");
    phpContent.push("{name:}")*/

    var group = $('#main_head_buttoninput_input_description_textfield').val();


    $('.listobject').each(function(index){

      var img = $(this).children().first().children().html();
      var imgtext = $(this).children().last().children().val();

        //phpContent += "{img:'" + img + "' , text:'" + imgtext +"'},";
      /*  if(index !== listobjectlength-1)
         {
        phpContent.push("{name:'" + img + "' , value:'" + imgtext +"'}");
         }
         else {
           phpContent.push("{name:'" + img + "' , value:'" + imgtext +"'}]}");
         }*/

         var tempString = "{name:"+img+",desription:"+ imgtext +",group:"+group+"}";
      //   var temp = new entry(img,imgtext,group);
         phpContent.images.push({"name":img,"description":"hallo","group":"hallo"});

    });



    window.alert(phpContent);
    $.ajax({
      type:'POST',
      url:'testpost.php',
      data:{mydata:JSON.stringify(phpContent)},
      success:function()
      {
        window.alert("Die Daten wurden übertragen");
      }
    });

  });

});
