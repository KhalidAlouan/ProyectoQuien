//GLOBAL VAR
var CARTA_SERVIDOR = document.getElementById("servCard");
var contador_intentos = 0;
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
//Funcion que se ejecuta nada mas cagar la pagina que añade todos los eventos necesarios.
window.onload = function addEvent(){
	hiddenPreguntaUsuarioAñadirRanking();
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
function hiddenPreguntaUsuarioAñadirRanking(){
	var preguntaUsuarioRanking = document.getElementById("preguntaAñadirUsuarioRanking");
	var botonUsuarioRanking = document.getElementById("opcion");
	var nombreUsuarioRanking = document.getElementById("añadirNombre");

	preguntaUsuarioRanking.style.visibility = 'hidden';
	botonUsuarioRanking.style.visibility = 'hidden';
	nombreUsuarioRanking.style.visibility = 'hidden';

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


		//modalGanar();
	}else{
		modalOn();
		texto.innerHTML = "Has perdido."


		//modalPerder();

	}

	
}

function comboBoxGafas(){
	var gafasSeleccionado = document.getElementById("gafas").value.toString();
	var atributoCartaSevidorGafas =CARTA_SERVIDOR.children[1].children[0].getAttribute("gafas").toString();
	if (gafasSeleccionado == "si") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Lleva gafas?\n '
		if (atributoCartaSevidorGafas == "si") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	}
	if (gafasSeleccionado == "no") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: No lleva gafas?\n '
		if (atributoCartaSevidorGafas == "no") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	

	}	
}
function comboBoxSexo(){
	var sexoSeleccionado = document.getElementById("sexo").value.toString();
	var atributoCartaSevidorSexo =CARTA_SERVIDOR.children[1].children[0].getAttribute("sexo").toString();
	if (sexoSeleccionado == "hombre") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es hombre?\n '
		if (atributoCartaSevidorSexo == "hombre") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	}
	if (sexoSeleccionado == "mujer") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es mujer?\n '
		if (atributoCartaSevidorSexo == "mujer") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	

	}	
}

function comboBoxPelo(){
	var peloSeleccionado = document.getElementById("pelo").value.toString();
	var atributoCartaSevidorPelo =CARTA_SERVIDOR.children[1].children[0].getAttribute("pelo").toString();
	if (peloSeleccionado == "moreno") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es moreno?\n '
		if (atributoCartaSevidorPelo == "moreno") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	}
	if (peloSeleccionado == "rubio") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es rubio?\n '
		if (atributoCartaSevidorPelo == "rubio") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}

	}	
	if (peloSeleccionado == "pelirrojo") {
		var textAreaAnadirTextoCliente = document.getElementById("area").value += 'Pregunta escogida: Es pelirrojo?\n '
		if (atributoCartaSevidorPelo == "pelirrojo") {
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Afirmativo\n';
		}else{
			var textAreaAnadirTextoServidor = document.getElementById("area").value += '> Servidor: Negativo\n';
		}
	

	}	

}
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

function combo2(){
	var sexo=document.getElementById("sexo");
	var sexo2=sexo.options[sexo.selectedIndex].text;
	var area=document.getElementById("area");
	var s=document.getElementById("s").innerHTML;
	
	area.innerHTML=sexo+sexo2;

}

//Crea un objeto de tipo audio y que se ejecuta
function audio() {
	var audio = new Audio('latigo.mp3');
    audio.play();
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
    	modal.style.visibility="visible";
        modal.style.display="block";
        document.getElementById("combos").selectedIndex=0;
        document.getElementById("sexo").selectedIndex=0;
        document.getElementById("pelo").selectedIndex=0;
    }

    if (contador_intentos >= 1) {
    	desactivarModo();
    }

		
	contador_intentos++

	document.getElementById("contador").innerHTML = "Has hecho : "+contador_intentos+" "+"preguntas";


	/*if ( cont_cartas == cartas) {
		alert("seguro?")
	} else {
		cont_cartas--;
	}*/

}

function desactivarModo(){
    var easy=document.getElementById("easy");
	var easy2=document.getElementById("easydos");

    
    easy2.disabled=true;
}

//Button que cierra el modal
function CerrarModal(){
	var cerrar=document.getElementsByClassName("cerrar")[0];
	var modal=document.getElementById("modal");
	
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