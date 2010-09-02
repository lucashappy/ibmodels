function showModelInfo(data){
	
	var kwicks = $$('.modelValue')
	//var fx = new Fx.Elements(kwicks, {wait: false, duration: 300, transition: Fx.Transitions.Back.easeOut});

	

	model = data.split("|");
	

	
	var i = 5;
	kwicks.each(function(p){
		  p.setText(model[i++]);
		});

	$$('#modelInfo').setStyle('visibility','visible');
 



}

function hideModelInfo(){
 
	$$('#modelInfo').setStyle('visibility','hidden');
	
}