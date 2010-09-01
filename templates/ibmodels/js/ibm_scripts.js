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

/*--------------------Fade de carregamento da div conteudo------*/


window.onload(function(){
      $.fx.off = false;
      $("#fundo_conteudo").fadeIn('slow', function () {
            $("#conteudo").fadeIn(100);
          });
});
