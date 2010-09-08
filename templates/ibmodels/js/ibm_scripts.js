/*----------------Scroll da div conteudo--------------------------*/
var hoverInterval;
  function doStuff() {
    $("#conteudo").scrollTo( "+=3px", { axis:"y" } );
    }

$(function() {
    $("a.next").hover(
        function() {
            // call doStuff every 100 milliseconds
            hoverInterval = setInterval(doStuff, 40);
        },
        function() {
            // stop calling doStuff
            clearInterval(hoverInterval);
        }
    );
});
function doStuff2() {
    $("#conteudo").scrollTo( "-=3px", { axis:"y" } );
    }

$(function() {
    $("a.prev").hover(
        function() {
            // call doStuff every 100 milliseconds
            hoverInterval = setInterval(doStuff2, 40);
        },
        function() {
            // stop calling doStuff
            clearInterval(hoverInterval);
        }
    );
});
$(document).ready(function(){
    $(".prev").click(function(){
      $("#conteudo").scrollTo(0);
});
});
$(document).ready(function(){
    $(".next").click(function(){
      $("#conteudo").scrollTo('100%');
});
});

$(function() {
$("#conteudo").mousewheel(function(event, delta) {
	if (delta > 0)
		$("#conteudo").scrollTo( "-=10px", { axis:"y" } );
	else if (delta < 0)
		$("#conteudo").scrollTo( "+=10px", { axis:"y" } );
});
});

/*--------------------Fade de carregamento da div conteudo------*/


$(document).ready(function(){
      $.fx.off = false;
      $("#fundo_conteudo").hide();
      $("#conteudo").hide();
      $("#fundo_conteudo").fadeIn('slow', function () {
            $("#conteudo").fadeIn(100);
      });
});

/*-----------------------Reposicionamento do menu -------------------*/
/*
$(document).ready(function(){
      $("#mainmenu").css("margin-top",function(){
		return $(window).height()/2 - $("#title").height() - $("#mainmenu").height()/2 -10;} );
      $("#fundo_conteudo").css("margin-top",function(){
		return $(window).height()/2 - $("#title").height() - $("#fundo_conteudo").height()/2 +10;} );
      $("#conteudo").css("margin-top",function(){
		return $(window).height()/2 - $("#title").height() - $("#conteudo").height()/2 +10;} );
     $("#actions").css("margin-top",function(){
		return $(window).height()/2 + $("#fundo_conteudo").height()/2 - $("#title").height()/2;} );
 });*/

$(document).ready(function(){
      $("#fundo_menu").css("width", function(){
	      return $(window).width()- 5;
      });
      $("#fundo_menu").css("height", function(){
	      return $("#mainmenu").height();
      });
      $("#fundo_menu").css("margin-left", function(){
	      return -($(window).width() /2 -$("#main").width()/2 -2);;
      });
    $("#fundo_menu").css("margin-top", function(){
	      return $(window).height() /2 -$("#fundo_menu").height()/2 -$("#title").height();;
      });
      if(screen.height > 800){ function(){
          /* $("#mainmenu").css("margin-top",function(){
		return $(window).height()/2 - $("#title").height() - $("#mainmenu").height()/2 -10;} );*/
	   $("#fundo_conteudo").css("margin-top",function(){
		return $(window).height()/2 - $("#title").height() - $("#fundo_conteudo").height()/2 +10;} );
	    $("#fundo_conteudo").css("margin-left",function(){
		return -($(window).width()/2 + $("#mainmenu").width() - $("#fundo_conteudo").width()/2 +10);} );
	   $("#conteudo").css("margin-top",function(){
		return $(window).height()/2 - $("#title").height() - $("#conteudo").height()/2 +10;} );
	   $("#actions").css("margin-top",function(){
		return $(window).height()/2 + $("#fundo_conteudo").height()/2 - $("#title").height()/2;} );
      }}
});
