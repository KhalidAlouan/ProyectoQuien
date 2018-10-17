function flip(element) {
	cartaServidor = document.getElementById("servCard").id;
	element = element.target.parentNode.parentNode;
	if (element.id != cartaServidor) {
    	element.classList.add("flipped");
	}  

}

window.onload = function addEvent(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		cartas[i].addEventListener("click",flip);
	}
}
