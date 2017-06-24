$(document).ready(function(){
  setInterval(function() {
    $('#slide_img_arround > div:first')
      .fadeOut(1000)
      .next()
      .fadeIn(1000)
      .end()
      .appendTo('#slide_img_arround');
  },  3000);
});
