$( document ).ready(function() {
});

$( window ).on( "load", function() {

// DRAGGABLE MENU
  var divHover = null,
    windowClick = false;

    $(window).mousedown(function(){
    windowClick = true;
  });
  
  $(window).mouseup(function(){
    windowClick = false;
  });
  
  $('.menu').hover(function(){
    if(divHover === null){
      divHover = $(this);
    }
  }, function(){
    if(windowClick === false){
      divHover = null;
      $(this).css('z-index', '0');
    }
  });
  
  $(window).mousemove(function(e){
    if(windowClick === true && divHover != null){
      divHover.css({ top: e.clientY - divHover.height() / 2 + 'px', left: e.clientX - divHover.width() / 2 + 'px', position: 'absolute', zIndex: '1' });
    }
  });

// TOGGLE MENU
  $("div#menu h1").on("click",function(){

    if($(this).hasClass("active")){
      $("#sousmenu").css("display", "none");
      $(this).removeClass('active');
    }
    else {
      $("#sousmenu").css("display", "block");
      $(this).addClass('active');
    }
  });

    $("div#contact h1").on("click",function(){

    if($(this).hasClass("active")){
      $("#souscontact").css("display", "block");
      $(this).removeClass('active');
    }
    else {
      $("#souscontact").css("display", "none");
      $(this).addClass('active');
    }
  });

    $("div#recherche h1").on("click",function(){

    if($(this).hasClass("active")){
      $("#sousrecherche").css("display", "block");
      $(this).removeClass('active');
    }
    else {
      $("#sousrecherche").css("display", "none");
      $(this).addClass('active');
    }
  });
});
