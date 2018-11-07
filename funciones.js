//GLOBAL VAR INMUTABLE
var CARTA_SERVIDOR = document.getElementById("servCard");
//GLOBAL VAR
var easyMode = false;
var veryEasyMode = false;
var cartas = 11;
var contador_intentos = 0;
var cartaFinal;
var cartasConFlipped = 0;

//GLOBAL END
// Get the modal
function modalOn(){
	var contadorIntentos = document.getElementById("texto");
	var modal = document.getElementById('modalUno');
    modal.style.display = "block";
    contadorIntentos.value = contador_intentos;
	console.log(contador_intentos);
	console.log(contadorIntentos.value);

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
//Funcion que se ejecuta nada mas cagar la pagina que añade todos los eventos necesarios.
window.onload = function addEvent(){
	hiddenPreguntaUsuarioAñadirRanking();
	var cartas = document.getElementsByClassName("card");
	var span = document.getElementsByClassName("close")[0];
	var preguntar = document.getElementById("ferLaPregunta");
	var easydos = document.getElementById('easydos');
	var veryeasy = document.getElementById('veryeasy');

	span.addEventListener("click",spanDisplayNone);
	preguntar.addEventListener("click", comboAll);
	easydos.addEventListener('click', easyModeOn);
	veryeasy.addEventListener('click',easyModeOn);

	for (var i = 0 ; cartas.length -1 >= i; i++) {

		cartas[i].addEventListener("click",flip);
		cartas[i].addEventListener("click",audio);
	}
}
function hiddenFireworks() {
	var divFire = document.getElementsByClassName("pyro");
		divFire.style.visibility = 'hidden';

}
function hiddenPreguntaUsuarioAñadirRanking(){
	var preguntaUsuarioRanking = document.getElementById("preguntaAñadirUsuarioRanking");
	var botonUsuarioRanking = document.getElementById("opcion");
	var nombreUsuarioRanking = document.getElementById("añadirNombre");
	var contadorIntentos = document.getElementById("texto");

	preguntaUsuarioRanking.style.visibility = 'hidden';
	botonUsuarioRanking.style.visibility = 'hidden';
	nombreUsuarioRanking.style.visibility = 'hidden';
	contadorIntentos.style.visibility = 'hidden';



	preguntaUsuarioRanking.innerHTML = "Quieres añadir tu nombre al ranking?";

}

function mostrarPreguntaUsuarioAñadirRanking(){
	var preguntaUsuarioRanking = document.getElementById("preguntaAñadirUsuarioRanking");
	var botonUsuarioRanking = document.getElementById("opcion");
	var nombreUsuarioRanking = document.getElementById("añadirNombre");
	botonUsuarioRanking.style.visibility = '';
	preguntaUsuarioRanking.style.visibility = '';
	nombreUsuarioRanking.style.visibility = '';

}

function endGame(){
	cartaServidorImg = CARTA_SERVIDOR.children[1].children[0];
	var cartas = document.getElementsByClassName("card");
	var texto = document.getElementById("textoFinal");

	for (var i = 0 ; cartas.length -1 >= i; i++) {

		if (cartas[i].classList.contains("flipped") == false) {
			cartaFinal = cartas[i].children[0].children[0];
		}
	}
	CARTA_SERVIDOR.classList.add("flipped");
	if (cartaServidorImg.src == cartaFinal.src ) {
		modalOn();
		mostrarPreguntaUsuarioAñadirRanking();
		texto.innerHTML = "Has ganado."

	}else{
		modalOn();
		texto.innerHTML = "Has perdido."

	}
	
}

//Se encarga de añadir la class que permite el efecto de girar.
function flip(element) {
	if (cartas!=0) {
		element = element.target.parentNode.parentNode;
		if(element.classList.contains("flipped")== false && element.id != CARTA_SERVIDOR.id ){
			cartas--;
		}
		if (element.id != CARTA_SERVIDOR.id) {
	    	element.classList.add("flipped");

		}
	}
	if (cartas == 0){
		endGame();
	}
	
	

}
function comboAll(){
	comboBoxGafas();
	comboBoxSexo();
	comboBoxPelo();
}
function comboBoxGafas(){
	var gafasSeleccionado = document.getElementById("preguntasVarias").value.toString();
	var atributoCartaSevidorGafas =CARTA_SERVIDOR.children[1].children[0].getAttribute("gafas").toString();
	if (gafasSeleccionado == "si") {
		if(veryEasyMode == true){
			eliminarOpcion(gafasSeleccionado);
		}
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Lleva gafas?\n '
		if (atributoCartaSevidorGafas == "si") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
			if (easyMode == true) {
				easyModeComparacionGafasA();
			}
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
			if (easyMode == true) {
				easyModeComparacionGafasB();
			}
			
		}
	}
	if (gafasSeleccionado == "no") {
		if(veryEasyMode == true){
			eliminarOpcion(gafasSeleccionado);
		}
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: No lleva gafas?\n '
		if (atributoCartaSevidorGafas == "no") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
			if (easyMode == true) {
				easyModeComparacionGafasB();
			}
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
			if (easyMode == true) {
				easyModeComparacionGafasA();
			}
		}
	

	}	
}



function comboBoxSexo(){
	var sexoSeleccionado = document.getElementById("preguntasVarias").value.toString();
	var atributoCartaSevidorSexo =CARTA_SERVIDOR.children[1].children[0].getAttribute("sexo").toString();
	if (sexoSeleccionado == "hombre") {
		if(veryEasyMode == true){
			eliminarOpcion(sexoSeleccionado);
		}
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es hombre?\n '
		if (atributoCartaSevidorSexo == "hombre") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
			if (easyMode == true) {
				easyModeComparacionSexoA();
			}
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
			if (easyMode == true) {
				easyModeComparacionSexoB();
			}
		}
	}
	if (sexoSeleccionado == "mujer") {
		if(veryEasyMode == true){
			eliminarOpcion(sexoSeleccionado);
		}
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es mujer?\n '
		if (atributoCartaSevidorSexo == "mujer") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
			if (easyMode == true) {
				easyModeComparacionSexoB();
			}
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
			if (easyMode == true) {
				easyModeComparacionSexoA();
			}
		}
	

	}	
}

function eliminarOpcion(opcion){
	var opciones = document.getElementById("preguntasVarias");
	for (var i = opciones.length - 1; i >= 0; i--) {
		if (opciones.options[i].value == opcion) {
			opciones.remove(i);
		}
	}

}


function comboBoxPelo(){
	var peloSeleccionado = document.getElementById("preguntasVarias").value.toString();
	var atributoCartaSevidorPelo =CARTA_SERVIDOR.children[1].children[0].getAttribute("pelo").toString();
	if (peloSeleccionado == "moreno") {
		if(veryEasyMode == true){
			eliminarOpcion(peloSeleccionado);
		}
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es moreno?\n '
		if (atributoCartaSevidorPelo == "moreno") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
			if (easyMode == true) {
				easyModeComparacionPeloA();
			}
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
			if (easyMode == true) {
				easyModeComparacionPeloANegativo();
			}
		}
	}
	if (peloSeleccionado == "rubio") {
		if(veryEasyMode == true){
			eliminarOpcion(peloSeleccionado);
		}
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es rubio?\n '
		if (atributoCartaSevidorPelo == "rubio") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
			if (easyMode == true) {
				easyModeComparacionPeloB();
			}
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
			if (easyMode == true) {
				easyModeComparacionPeloBNegativo();
			}
		}

	}	
	if (peloSeleccionado == "pelirrojo") {
		if(veryEasyMode == true){
			eliminarOpcion(peloSeleccionado);
		}
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es pelirrojo?\n '
		if (atributoCartaSevidorPelo == "pelirrojo") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
			if (easyMode == true) {
				easyModeComparacionPeloC();
			}
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
			if (easyMode == true) {
				easyModeComparacionPeloCNegativo();
			}
		}
	

	}	

}

//Crea un objeto de tipo audio y que se ejecuta
function audio() {
	var audio = new Audio('latigo.mp3');
    audio.play();

}

// La siguiente función recoge el texto del primer select y 
// lo mete en el textarea
function combo(){
	if (contador_intentos>=1-1) {
		desactivarModo();
	}
	contador_intentos ++;
	if (easyMode == true) {
		contador_intentos++;
	}
	document.getElementById("contador").innerHTML = "Has hecho : "+contador_intentos+" "+"preguntas";
	}

function desactivarModo(){
	var easy2=document.getElementById("easydos");
    easy2.disabled=true;
}

//Button que cierra el modal
function cerrarModal(){
	var cerrar=document.getElementsByClassName("cerrar")[0];
	var modal=document.getElementById("modal-error");
	
	modal.style.visibility="hidden";
	modal.style.display="none";
		
}

//Función que cierra el modal al clicar fuera de el modal
window.onclick=function(event){
	var modal=document.getElementById("modal");
	if (event.target==modal){
		modal.style.visibility="hidden";
		modal.style.display="none";
	}

}


//F-Artificiales
function fuegosArt(){
	location.href ="FireWorks.html"
}


function hiddenEasyButton() {
	var label=document.getElementById("easy");
	var selectModos=document.getElementById("selectModos");
	label.style.visibility="hidden";
	selectModos.style.visibility="hidden";
}

//MODE EASY
function easyModeOn() {
	hiddenEasyButton();
	removeOnclickFlip();
	var veryEasyModeOn = document.getElementById("selectModos").value.toString();
	easyMode = true;
	if (veryEasyModeOn == 'veryEasy') {
				veryEasyMode = true;
	}
}

function removeOnclickFlip(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		cartas[i].removeEventListener("click", flip);
	}
}
function easyModeComparacionGafasA(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('gafas') == 'no'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();
}
function easyModeComparacionGafasB(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('gafas') == 'si'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();
}
function easyModeComparacionSexoA(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('sexo') == 'mujer'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();
}
function easyModeComparacionSexoB(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('sexo') == 'hombre'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();
}
function easyModeComparacionPeloA(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('pelo') != 'moreno'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();
}
function easyModeComparacionPeloANegativo(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('pelo') == 'moreno'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();
}
function easyModeComparacionPeloB(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('pelo') != 'rubio'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();

}
function easyModeComparacionPeloBNegativo(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('pelo') == 'rubio'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();

}
function easyModeComparacionPeloC(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('pelo') != 'pelirrojo'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();

}
function easyModeComparacionPeloCNegativo(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].id != CARTA_SERVIDOR.id ){
			if(cartas[i].children[0].children[0].getAttribute('pelo') == 'pelirrojo'){
				cartas[i].classList.add("flipped");
			}	
		}
	}
	endGameEasy();
}

function endGameEasy(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		if (cartas[i].classList.contains("flipped")) {
			cartasConFlipped++;

		}
	}
	if (cartasConFlipped == 11) {
		endGame();
	}
	cartasConFlipped = 0;
}

//END MODE EASY