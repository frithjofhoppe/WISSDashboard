$(document).ready(function(){
$('#sidebare_middle_text_link9').click(function(){

  ipadress = "";
  $.ajax({
    url:"getIP.php",
    success:function(data){
      ipadress = data;

      $.ajax({
        url:"http://"+ipadress+"/restart.php?pw=raspiwebserver",
        crossDomain: true,
        dataType: 'jsonp',
      });

      window.alert("Gerät wird neu gestartet");
    }
  });
});
});
