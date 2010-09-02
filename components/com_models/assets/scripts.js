
   1. var gal = {
   2. init : function() {
   3. if (!document.getElementById || !document.createElement || !document.appendChild) return false;
   4. if (document.getElementById('gallery')) document.getElementById('gallery').id = 'jgal';
   5. var li = document.getElementById('jgal').getElementsByTagName('li');
   6. li[0].className = 'active';
   7. for (i=0; i<li.length; i++) {
   8. li[i].style.backgroundImage = 'url(' + li[i].getElementsByTagName('img')[0].src + ')';
   9. li[i].title = li[i].getElementsByTagName('img')[0].alt;
  10. gal.addEvent(li[i],'click',function() {
  11. var im = document.getElementById('jgal').getElementsByTagName('li');
  12. for (j=0; j<im.length; j++) {
  13. im[j].className = '';
  14. }
  15. this.className = 'active';
  16. });
  17. }
  18. },
  19. addEvent : function(obj, type, fn) {
  20. if (obj.addEventListener) {
  21. obj.addEventListener(type, fn, false);
  22. }
  23. else if (obj.attachEvent) {
  24. obj["e"+type+fn] = fn;
  25. obj[type+fn] = function() { obj["e"+type+fn]( window.event ); }
  26. obj.attachEvent("on"+type, obj[type+fn]);
  27. }
  28. }
  29. }
  30. gal.addEvent(window,'load', function() {
  31. gal.init();
  32. });

   
function showModelInfo(data,url,photosNames){
	
	var kwicks = $$('.modelValue');
	//var fx = new Fx.Elements(kwicks, {wait: false, duration: 300, transition: Fx.Transitions.Back.easeOut});


	model = data.split("|");


	
	var i = 5;
	kwicks.each(function(p){
		  p.setText(model[i++]);
		});

	$$('#modelInfo').setStyle('visibility','visible');
 
//Galeria
	photos = photosNames.split("|");
	//Galleria.loadTheme('../src/themes/galleria.classic.js');
    //Galleria.loadTheme('galleria/themes/galleria.classic.js');
	for(i=0;i<photos.length;i++){
		//document.write(photos[i]);
		new Element('li', {id: 'love'+i}).inject($('galleria'));
		new Element('img', {src: url+'/'+photos[i],'alt':photos[i]}).inject($('love'+i));
	
	}
	
	//var gall = document.getElementById("galleria");
	


			//$('galleria').galleria();
	


	//document.write('Hello World'); 
	
	// $$('#modelInfo').setStyle('visibility','hidden');
		//var myGallery = new gallery($('galleria'), {
		//timed: false
		//});
	

}

function galleryConstruct(){
	var gall = document.getElementById("galleria");
	
}

function hideModelInfo(){
 

	 //var galeria = $$('#galleria img');
	 var cell = document.getElementById("galleria");

	 if ( cell.hasChildNodes() )
	 {
	     while ( cell.childNodes.length >= 1 )
	     {
	         cell.removeChild( cell.firstChild );       
	     } 
	 }

	 $$('#modelInfo').setStyle('visibility','hidden');
}