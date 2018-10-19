//GLOBAL VAR
var CARTASERVIDOR = document.getElementById("servCard");
var cartas = 11;
var cartaFinal;
//GLOBAL END

function endGame(){
	cartaServidorImg = CARTASERVIDOR.children[1].children[0];
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {

		if (cartas[i].classList.contains("flipped") == false) {
			cartaFinal = cartas[i].children[0].children[0];
		}
	}
	if (cartaServidorImg.src == cartaFinal.src ) {
		console.log("Win");
	}else{
		console.log("Pringado");
	}

	
}
//Se encarga de añadir la class que permite el efecto de girar.
function flip(element) {
	if (cartas!=0) {
		element = element.target.parentNode.parentNode;
		if(element.classList.contains("flipped")== false && element.id != CARTASERVIDOR.id ){
			cartas--;
		}
		if (element.id != CARTASERVIDOR.id) {
	    	element.classList.add("flipped");

		}
	}
	if (cartas == 0){
		endGame();
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
	
}

function combo2(){
	var sexo=document.getElementById("sexo");
	var sexo2=sexo.options[sexo.selectedIndex].text;
	var area=document.getElementById("area");
	var s=document.getElementById("s").innerHTML;
	
	area.innerHTML=sexo+sexo2;

}
