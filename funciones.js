var contador_intentos = 0;
//Se encarga de añadir la class que permite el efecto de girar.
function flip(element) {
	cartaServidor = document.getElementById("servCard").id;
	element = element.target.parentNode.parentNode;
	if (element.id != cartaServidor) {
    	element.classList.add("flipped");
	}  

}
//Funcion que se ejecuta nada mas cagar la pagina que añade la funcion flip() a las cartas.
window.onload = function addEvent(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		cartas[i].addEventListener("click",flip);
	}
}



// La siguiente función recoge el texto del primer select y 
// lo mete en el textarea
function combo(){
	var sel=document.getElementById("combos");
	var selected=sel.options[sel.selectedIndex].text;
	var are=document.getElementById("area");
	var gafas=document.getElementById("gafas").innerHTML;
	
	are.innerHTML=gafas+selected;

	

	var combos = document.getElementById("combos").value;
	var sexo = document.getElementById("sexo").value;
	var pelo = document.getElementById("pelo").value;

	array_select = [combos,sexo,pelo];

	var_contar_nulls = 0;

	for (var i = 0; i < array_select.length; i++) {
		if (array_select[i] == "") {
			var_contar_nulls++;
		}
	}

	if (var_contar_nulls <= 1) {
		alert("error");
		combos.options[combos.selectedIndex]=" ";
		sexo.selectedIndex =" ";
		pelo.selectedIndex =" ";
	}

	
	contador_intentos++

	document.getElementById("contador").innerHTML = "Has hecho : "+contador_intentos+" "+"preguntas";
	
}

function combo2(){
	var sexo=document.getElementById("sexo");
	var sexo2=sexo.options[sexo.selectedIndex].text;
	var area=document.getElementById("area");
	var s=document.getElementById("s").innerHTML;
	
	area.innerHTML=sexo+sexo2;

}

function sonido(){
    var audio = new Audio('latigo.mp3');
    audio.play();
}