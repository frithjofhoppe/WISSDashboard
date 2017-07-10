$(document).ready(function(){


  var $img = $('#sidebar_middle_center');
  var $main = $(".text_p");
  var $pic = $(".main-picture");
  var $mainpic = $("#img_head");
  var $headline = $(".head_p")
  var $textTop = $("#main_second_text1");
  var $textBottom = $("#main_4_text1");
  var $textTitel = $("#main_first_titel");
  var pic = false;
  var xhr1 = new XMLHttpRequest();

  $textTitel.load('text/titel.txt');
  $textBottom.load('text/contentBottom.txt');
  $textTop.load('text/contentTop.txt');

  $('#sidebar_middle_center').hide().slideDown();
    $img.hide().each(function(index){
    $img.delay(100*index).fadeIn(700);
  });

  $('p').hide().slideDown();
    $main.hide().each(function(index){
    $main.delay(100*index).fadeIn(700);
  });

  $('.main-picture').hide().slideDown();
    $pic.hide().each(function(index){
    $pic.delay(100*index).fadeIn(700);
  });

  $('#img_head').hide().slideDown();
    $mainpic.hide().each(function(index){
    $mainpic.delay(100*index).fadeIn(500);
  });

  $('.head_p').hide().slideDown();
    $headline.hide().each(function(index){
    $headline.delay(100*index).fadeIn(2500);
  });

/*  $("body").on('click','.zoompic',function(){
      this.src=$(this).attr('src');
      pic = true;

      this.src=$(this).attr('http://127.0.0.1/dashboard/dashboard_appmenu/');
  });*/

/*  $('sidebar_middle_center').on('click',function(event){
    event.preventDefault();
    $(this).animate({
    },700,function(){
        $(this).css({"opacity":"1.0"})
    });
  });*/
});
