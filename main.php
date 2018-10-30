<html>
<head>
	<script type="text/javascript" defer src="funciones.js"></script>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>


<?php
echo "
	<div id='modalUno' class='modal'>
		<div class='modal-content'>
			<span class='close'>&times;</span>
			<h1 id='textoFinal'></h1>
			<h3 id='preguntaAñadirUsuarioRanking'></h3>
			<form action='ranking.php' method='post'>
				<input id='añadirNombre'type='text' name='añadirNombre'>
				<input id='opcion'type='submit' value='Añadir'>
				<input id='texto' name='contador' type='text'>
			</form>

		</div>
	</div>
";

//Modo easy
echo "<label id='easy'>Modo:</label>"; echo "<br>";
echo "<select id='selectModos'>";
echo "<option id='easydos' value='easy'>Easy</option>";
echo "<option id='veryeasy' value='veryEasy'>Very Easy</option>";
echo "</select>";
//Mostrar el contador de preguntas
echo "<p id='contador' align='right'> Has hecho: 0 preguntas </p>";
//Funcion que lee el archivo imatges.txt para extraer linea por linea el nombre de la imagen.
function leerFicheroYExtraerNombre(){

	$array_de_lineas = file("config/imatges.txt");
	$longitude_de_array = count($array_de_lineas);
	$array_nombres_imagenes_ordenados = array();

	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/:/", $array_de_lineas[$i]);
		$var_guardar_nombre = $x[0];
		array_push($array_nombres_imagenes_ordenados, $var_guardar_nombre);
	}
	return $array_nombres_imagenes_ordenados;
}
//Funcion que lee el archivo imatges.txt para extraer linea por linea las caracteristicas.
function leerFicheroYExtraerCaracteristicas(){
	$array_de_lineas = file("config/imatges.txt");
	$longitude_de_array = count($array_de_lineas);
	$array_caracteristicas_ordenadas = array();

	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/:/", $array_de_lineas[$i]);
		$var_guardar_caracteristicas = $x[1];
		array_push($array_caracteristicas_ordenadas,$var_guardar_caracteristicas);
	}
	$array_caracteristicas_completas_img= separarCaracteristicas($array_caracteristicas_ordenadas,$longitude_de_array);

	return $array_caracteristicas_completas_img;

}
//Funcion que separa todas las caracteristicas y las coloca correctamente en otro array.
function separarCaracteristicas($array_caracteristicas_ordenadas,$longitude_de_array){
	$array_de_lineas = file("config/config.txt");
	$numeroCaracteristicas = count($array_de_lineas);
	for ($i=0; $i < $numeroCaracteristicas; $i++) { 
		 ${'array_caracteristica'.$i} = array();
	}
	// print_r($array_caracteristica0);
	// print_r($array_caracteristica1);
	// print_r($array_caracteristica2);

	$array_sexo = array();
	$array_pelo = array();
	$array_gafas = array();
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/,/", $array_caracteristicas_ordenadas[$i]);
		$count = count($x);
		for ($q=0; $q < $count; $q++) { 
			${"variable_caracteristica".$q} = $x[$q];
			array_push(${"array_caracteristica".$q},${"variable_caracteristica".$q});
			// print_r($array_caracteristica0);
			// print_r($array_caracteristica1);
			// print_r($array_caracteristica2);


		}
		$var_guardarSexo = $x[0];
		$var_guardarPelo = $x[1];
		$var_guardarGafas = $x[2];

		array_push($array_sexo,$var_guardarSexo);
		array_push($array_pelo,$var_guardarPelo);
		array_push($array_gafas,$var_guardarGafas);
	}

	for ($i=0; $i < $numeroCaracteristicas; $i++) { 
		 ${'array_caracteristica'.$i."U"} = array();
	}
	$array_sexoU = array();
	$array_peloU = array();
	$array_gafasU = array();
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		for ($q=0; $q < $count; $q++) { 
			${"split".$q} = preg_split("/ /", ${"array_caracteristica".$q}[$i]);
			${"variable_caracteristica".$q."U"} = ${"split".$q}[2];
			array_push(${"array_caracteristica".$q."U"},${"variable_caracteristica".$q."U"});
			// print_r($array_caracteristica0U);
			// print_r($array_caracteristica1U);
			// print_r($array_caracteristica2U);
		}
		$s = preg_split("/ /", $array_sexo[$i]);
		$p = preg_split("/ /", $array_pelo[$i]);
		$g = preg_split("/ /", $array_gafas[$i]);

		$var_guardarSexoU = $s[2];
		$var_guardarPeloU = $p[2];
		$var_guardarGafasU = $g[2];
		//Con la funcion trim estoy eliminando el \n del final de linea.
		$var_guardarGafasUTrimmed = trim($var_guardarGafasU, " \n");
		$var_guardarGafasUTrimmed = preg_replace('/\s+/', '', $var_guardarGafasU);



		array_push($array_sexoU,$var_guardarSexoU);
		array_push($array_peloU,$var_guardarPeloU);
		array_push($array_gafasU,$var_guardarGafasUTrimmed);
	}
	//Aqui al separar todas las caracteristicas, contruimos otro array similar a una imagen en HTML para introducir por separado las caracteristicas.
	$array_nombres_caracteristicas = leerConfigYSacarNombres();
	print_r($array_nombres_caracteristicas);
	$array_caracteristicas_completas_img = array();
	$text = "<img class='img'"
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$text = "<img class='img' sexo='$array_sexoU[$i]' pelo='$array_peloU[$i]' gafas='$array_gafasU[$i]' ";

		array_push($array_caracteristicas_completas_img,$text);
	}

	return $array_caracteristicas_completas_img;
}
//En esta funcion acabamos de contruir la imagen añadiendo el nombre y su ruta.
function completarImagen ($array_nombres_imagenes_ordenados,$array_caracteristicas_completas_img){
	$arrayImagenHecha = array();
	$longitude_de_array = count($array_nombres_imagenes_ordenados);
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$textoCompleto = $array_caracteristicas_completas_img[$i]."src='assets/cartas/$array_nombres_imagenes_ordenados[$i]'>"; 
		array_push($arrayImagenHecha,$textoCompleto);
	}
	return $arrayImagenHecha;
}

$array_caracteristicas_completas_img= leerFicheroYExtraerCaracteristicas();
$array_nombres_imagenes_ordenados= leerFicheroYExtraerNombre();
$arrayImagenHecha = completarImagen($array_nombres_imagenes_ordenados,$array_caracteristicas_completas_img);
shuffle($arrayImagenHecha);

echo "<h4 align='center'>Carta del Servidor</h4>";

echo "<table style='border:2px solid black' align='center'";

echo "<tr><td style='border:1px solid black'>
<div class='container'>
 <div id = 'servCard'class='card' >
    <div class='front'>
          <img class='img' src='assets/reverso/cardBack.jpg'/>
    </div>
    <div class='back'>
   		 $arrayImagenHecha[0]
    </div>
  </div>
</div>
</td></tr>";


echo "</table>";



echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


shuffle($arrayImagenHecha);

echo "<h4 align='center'>Cartas del Cliente</h4>";
echo"<table style='border:2px solid black' align='center'>";
$contador = 0;
for ($i=1; $i <=4; $i++) { 
	echo "<tr>\n";
	for ($j=1; $j <=3; $j++) { 
		echo "<td style='border:1px solid black'>
			<div class='container'>
			  <div class='card' >
			    <div class='front'>
			    	$arrayImagenHecha[$contador]
			    </div>
			    <div class='back'>
			      <img class='img' src='assets/reverso/cardBack.jpg'/>
			    </div>
			  </div>
			</div></td>";
		$contador++;	
		
	}
	echo "</tr>";
}

echo"</table>";


// sexo: hombre mujer , Es hombre? ; Es mujer
// pelo: rubio moreno pelirrojo , Es rubio? ; Es moreno? ; Es pelirrojo?
// gafas: si no , Tiene gafas? ; No tiene gafas?

function leerConfigYSacarNombres(){
	$array_de_lineas = file("config/config.txt");
	$longitude_de_array = count($array_de_lineas);
	$array_nombres_caracteristicas = array();

	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/:/", $array_de_lineas[$i]);
		$var_guardar_nombre = $x[0];
		array_push($array_nombres_caracteristicas, $var_guardar_nombre);
	}
	return $array_nombres_caracteristicas;
}
function leerConfigYSacarElResto(){
	$array_de_lineas = file("config/config.txt");
	$longitude_de_array = count($array_de_lineas);
	$array_resto = array();

	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/:/", $array_de_lineas[$i]);
		$var_guardar = $x[1];
		array_push($array_resto, $var_guardar);
	}
	return $array_resto;
}
function separarArrayRestoYSacarOpciones($array_resto){
	$longitude_de_array = count($array_resto);
	$array_opciones = array();
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/,/", $array_resto[$i]);
		$var_guardar = $x[0];
		array_push($array_opciones, $var_guardar);
	}
	return $array_opciones;
}
function separarArrayRestoYSacarPreguntas($array_resto){
	$longitude_de_array = count($array_resto);
	$array_preguntas = array();
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/,/", $array_resto[$i]);
		$var_guardar = $x[1];
		array_push($array_preguntas, $var_guardar);
	}
	return $array_preguntas;
}
function separarOpciones($array_opciones){
	$longitude_de_array = count($array_opciones);
	$array_opcionesSeparadas = array();

	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/&/", $array_opciones[$i]);
		$var_guardar0 = $x[0];
		$var_guardar1 = $x[1];
		array_push($array_opcionesSeparadas, $var_guardar0);
		array_push($array_opcionesSeparadas, $var_guardar1);
		if (count($x) == 3 ){
			$var_guardar2 = $x[2];
			array_push($array_opcionesSeparadas, $var_guardar2);
		}
	}
	return $array_opcionesSeparadas;
}
function separarPreguntas($array_preguntas){
	$longitude_de_array = count($array_preguntas);
	$array_preguntasSeparadas = array();

	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/&/", $array_preguntas[$i]);
		$var_guardar0 = $x[0];
		$var_guardar1 = $x[1];
		array_push($array_preguntasSeparadas, $var_guardar0);
		array_push($array_preguntasSeparadas, $var_guardar1);
		if (count($x) == 3 ){
			$var_guardar2 = $x[2];
			array_push($array_preguntasSeparadas, $var_guardar2);
		}
	}
	return $array_preguntasSeparadas;
}

$array_nombres_caracteristicas = leerConfigYSacarNombres();
$array_resto = leerConfigYSacarElResto();
$array_opciones = separarArrayRestoYSacarOpciones($array_resto);
$array_preguntas = separarArrayRestoYSacarPreguntas($array_resto);
$array_opcionesSeparadas = separarOpciones($array_opciones);
$array_preguntasSeparadas = separarOpciones($array_preguntas);
$longitude_de_array = count($array_nombres_caracteristicas);
$longitude_de_arrayOpciones = count($array_opcionesSeparadas);

echo"<br>";
echo"<label>Preguntas: </label>";
echo"<select id='preguntasVarias'>";
echo"<option></option>";
for ($x=0; $x < $longitude_de_arrayOpciones; $x++) { 
	echo"<option value='$array_opcionesSeparadas[$x]'>$array_preguntasSeparadas[$x]</option>";		
	
}
echo "</select>";



echo"<br>";
echo"<br>";

// echo"<label id='g'> Accesorio:  </label>";
// echo"<select id='gafas'>";
// echo"<option></option>";
// echo"<option value='no'>No lleva gafas?</option>";
// echo"<option value='si'>Lleva gafas?</option>";
// echo "</select>";


// echo"<br>";

// echo"<label id='s'> Sexo:  </label>";
// echo"<select  id='sexo'>";
// echo"<option></option>";
// echo"<option value='hombre'>Es hombre?</option>";
// echo"<option value='mujer'>Es mujer?</option>";
// echo "</select>";

// echo"<br>";

// echo"<label id='p'> Pelo: </label>";
// echo"<select id='pelo'>";
// echo"<option></option>";
// echo"<option value='moreno'> Es moreno?</option>";
// echo"<option value='rubio'>Es rubio?</option>";
// echo"<option value='pelirrojo'>Es pelirrojo?</option>";
// echo "</select>";


echo "<input onclick='combo()' id = 'ferLaPregunta'type='button' value='Fes la Pregunta'>";
echo"<br>";
echo "<br>";



echo "<textarea rows='4' cols='50' id='area'>";

echo "</textarea>";

echo "<br>";

echo "<input type='button' value='Focs Artificials'onclick='fuegosArt()'>";
echo "</input>";



echo "<div id='modal-error' class='clasmodal'>";
	echo "<div class='contenido-error'>";
		echo "<span  class='cerrar-error'>";
		echo "</span>";
		echo "<p align='center'>Error: no puedes hacer mas de una pregunta</p>";
		echo "<button onclick='cerrarModal()'>Cerrar";
		echo "</button>";
echo "</div>";

?>
</body>
</html>
