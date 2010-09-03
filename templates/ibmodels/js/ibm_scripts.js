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
      $("#fundo_conteudo").fadeIn('slow', function () {
            $("#conteudo").fadeIn(100);
      });
});

/*-----------------------Reposicionamento do menu -------------------*/

$(document).ready(function(){
      $("#mainmenu").css("margin-top",function(){
		return $("#main").height()/2 - $("#mainmenu").height()/2;} );
});