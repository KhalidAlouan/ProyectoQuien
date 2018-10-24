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



// La siguiente funcion muestra un error si el usuario ha hecho mas de un pregunta
function combo(){
	var parrafo=document.getElementById("parrafo");
	var modal=document.getElementById("modal");
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

    contador_intentos++
    document.getElementById("contador").innerHTML = "Has hecho : "+contador_intentos+" "+"preguntas";

    if (var_contar_nulls <= 1) {
    	modal.style.visibility="visible";
        modal.style.display="block";
        document.getElementById("combos").selectedIndex=0;
        document.getElementById("sexo").selectedIndex=0;
        document.getElementById("pelo").selectedIndex=0;
    }
	

    if (contador_intentos>=1) {
    	desactivarModo();
    }
	
	 

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


	




