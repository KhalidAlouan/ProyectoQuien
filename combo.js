

// La siguiente función recoge el texto del primer select y 
// lo mete en el textarea
function combo(){
	var sel=document.getElementById("combos");
	var selected=sel.options[sel.selectedIndex].text;
	var are=document.getElementById("area");
	var gafas=document.getElementById("gafas").innerHTML;
	
	are.innerHTML=gafas+selected;
	
}

function combo2(){
	var sexo=document.getElementById("sexo");
	var sexo2=sexo.options[sexo.selectedIndex].text;
	var area=document.getElementById("area");
	var s=document.getElementById("s").innerHTML;
	
	area.innerHTML=sexo+sexo2;

}