//GLOBAL VAR
var CARTASERVIDOR = document.getElementById("servCard");
var cartas = 11;
var cartaFinal;

//GLOBAL END
// Get the modal
function modalOn(){
	var modal = document.getElementById('modalUno');
    modal.style.display = "block";
}
function spanDisplayNone(){
	var texto = document.getElementById("textoFinal");
	if (texto.innerHTML == "Has perdido."){
		location.reload(); 
	}else{
		var modal = document.getElementById('modalUno');
    	modal.style.display = "none";

	}

}
function endGame(){
	cartaServidorImg = CARTASERVIDOR.children[1].children[0];
	var cartas = document.getElementsByClassName("card");
	var texto = document.getElementById("textoFinal");

	for (var i = 0 ; cartas.length -1 >= i; i++) {

		if (cartas[i].classList.contains("flipped") == false) {
			cartaFinal = cartas[i].children[0].children[0];
		}
	}
	CARTASERVIDOR.classList.add("flipped");
	if (cartaServidorImg.src == cartaFinal.src ) {
		console.log("Win");
		modalOn();
		texto.innerHTML = "Has ganado."


		//modalGanar();
	}else{
		console.log("Pringado");
		modalOn();
		texto.innerHTML = "Has perdido."


		//modalPerder();

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
//Funcion que se ejecuta nada mas cagar la pagina que añade todos los eventos necesarios.
window.onload = function addEvent(){
	var cartas = document.getElementsByClassName("card");
	var span = document.getElementsByClassName("close")[0];
	var preguntar = document.getElementById("ferLaPregunta");
	span.addEventListener("click",spanDisplayNone);
	preguntar.addEventListener("click", comboBoxSexo);
	preguntar.addEventListener("click", comboBoxGafas);
	preguntar.addEventListener("click", comboBoxPelo);
	for (var i = 0 ; cartas.length -1 >= i; i++) {

		cartas[i].addEventListener("click",flip);
	}
}
function comboBoxGafas(){
	var gafasSeleccionado = document.getElementById("gafas").value.toString();
	var atributoCartaSevidorGafas =CARTASERVIDOR.children[1].children[0].getAttribute("gafas").toString();
	if (gafasSeleccionado == "si") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Lleva gafas? -Si\n '
		if (atributoCartaSevidorGafas == "si") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	}
	if (gafasSeleccionado == "no") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida Lleva gafas? -No\n '
		if (atributoCartaSevidorGafas == "no") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	

	}	
}
function comboBoxSexo(){
	var sexoSeleccionado = document.getElementById("sexo").value.toString();
	var atributoCartaSevidorSexo =CARTASERVIDOR.children[1].children[0].getAttribute("sexo").toString();
	if (sexoSeleccionado == "hombre") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es hombre? -Si\n '
		if (atributoCartaSevidorSexo == "hombre") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	}
	if (sexoSeleccionado == "mujer") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es hombre? -No\n '
		if (atributoCartaSevidorSexo == "mujer") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	

	}	
}

function comboBoxPelo(){
	var peloSeleccionado = document.getElementById("pelo").value.toString();
	var atributoCartaSevidorPelo =CARTASERVIDOR.children[1].children[0].getAttribute("pelo").toString();
	if (peloSeleccionado == "moreno") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Que color de pelo tiene? -Moreno\n '
		if (atributoCartaSevidorPelo == "moreno") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	}
	if (peloSeleccionado == "rubio") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Que color de pelo tiene? -Rubio\n '
		if (atributoCartaSevidorPelo == "rubio") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}

	}	
	if (peloSeleccionado == "pelirrojo") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Que color de pelo tiene? -Pelirrojo\n '
		if (atributoCartaSevidorPelo == "pelirrojo") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	

	}	

}
// La siguiente función recoge el texto del primer select y 
// lo mete en el textarea
// function combo(){
// 	var sel=document.getElementById("gafas");
// 	var selected=sel.options[sel.selectedIndex].text;
// 	var are=document.getElementById("area");
// 	var gafas=document.getElementById("g").innerHTML;
	
// 	are.innerHTML=gafas+selected;
	
// }

// function combo2(){
// 	var sexo=document.getElementById("sexo");
// 	var sexo2=sexo.options[sexo.selectedIndex].text;
// 	var area=document.getElementById("area");
// 	var s=document.getElementById("s").innerHTML;
	
// 	area.innerHTML=sexo+sexo2;

// }
