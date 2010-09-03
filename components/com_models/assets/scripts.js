
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
	var gall = document.getElementById("#galleria");
	
}

function hideModelInfo(){
 

	 //var galeria = $$('#galleria img');
	 var cell = document.getElementById("#galleria");

	 if ( cell.hasChildNodes() )
	 {
	     while ( cell.childNodes.length >= 1 )
	     {
	         cell.removeChild( cell.firstChild );       
	     } 
	 }

	 $$('#modelInfo').setStyle('visibility','hidden');
}