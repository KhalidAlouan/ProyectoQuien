function flip(element) {
	element = element.target.parentNode.parentNode;
    element.classList.add("flipped");
}

window.onload = function addEvent(){
	var cartas = document.getElementsByClassName("card");
	for (var i = 0 ; cartas.length -1 >= i; i++) {
		cartas[i].addEventListener("click",flip);
	}
}
