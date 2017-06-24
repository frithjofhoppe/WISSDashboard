$(document).ready(function(){

  var $img = $('.item');

  $('.item').hide().slideDown();
  $img.hide().each(function(index){
    $(this).delay(100*index).fadeIn(700);
  });

  $img.on('click',function(event){
    event.preventDefault();
    $(this).animate({
      opacity: 0.5,

    },700,function(){
        $(this).css({"opacity":"1.0"})
    });

  var link = $(this).children("a").attr("href");
  setTimeout(function()
  {
    window.location.href = link;
   },700);
  });
});
