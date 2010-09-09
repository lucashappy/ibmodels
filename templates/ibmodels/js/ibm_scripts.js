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

      if($(window).height() > 600){
	    var offset = $("#mainmenu").offset();
	    var offset2 = $("#title").offset();
        /*   $("#fundo_conteudo").css("margin-top",function(){
		return offset2.bottom;} );*/
	   $("#fundo_conteudo").css("margin-left",function(){
		return  offset.left;} );
	   $("#fundo_conteudo").css("height",function(){
		return  $(window).height() - $("#title").height() - $("#actions").height() -90;} );
	   $("#fundo_conteudo").css("margin-top",function(){
		return offset2.top + 30;} );
	   $("#conteudo").css("margin-top",function(){
		return offset2.top +30;} );
	   $("#conteudo").css("margin-left",function(){
		return offset.left;} );
	   $("#conteudo").css("height",function(){
		return  $(window).height() - $("#title").height() - $("#actions").height() -90;} );
	   $("#actions").css("margin-top",function(){
                var off3 = $("#fundo_conteudo").offset();
		return off3.top + $("#fundo_conteudo").height() - $("#actions").height()-10; } );
	    $(".modelInfo").css("margin-left", function(){
		return -120;});
       }
});
