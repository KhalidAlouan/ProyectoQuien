<?php 
	//Abrimos la sesión
	session_start()
?>


<html>
<head>
	<script type="text/javascript" defer src="funciones.js"></script>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body id="body">


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
echo "<button onclick='hola()' id='easydos'>Easy</button>";
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
	$array_sexo = array();
	$array_pelo = array();
	$array_gafas = array();
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/,/", $array_caracteristicas_ordenadas[$i]);
		$var_guardarSexo = $x[0];
		$var_guardarPelo = $x[1];
		$var_guardarGafas = $x[2];

		array_push($array_sexo,$var_guardarSexo);
		array_push($array_pelo,$var_guardarPelo);
		array_push($array_gafas,$var_guardarGafas);
	}


	$array_sexoU = array();
	$array_peloU = array();
	$array_gafasU = array();
	for ($i=0; $i <$longitude_de_array ; $i++) { 
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
	$array_caracteristicas_completas_img = array();
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
<div class='container_servidor'>
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



echo"<br>";
echo"<br>";

echo"<label id='g'> Accesorio:  </label>";
echo"<select id='gafas'>";
echo"<option></option>";
echo"<option value='no'>No lleva gafas?</option>";
echo"<option value='si'>Lleva gafas?</option>";
echo "</select>";


echo"<br>";

echo"<label id='s'> Sexo:  </label>";
echo"<select  id='sexo'>";
echo"<option></option>";
echo"<option value='hombre'>Es hombre?</option>";
echo"<option value='mujer'>Es mujer?</option>";
echo "</select>";

echo"<br>";

echo"<label id='p'> Pelo: </label>";
echo"<select id='pelo'>";
echo"<option></option>";
echo"<option value='moreno'> Es moreno?</option>";
echo"<option value='rubio'>Es rubio?</option>";
echo"<option value='pelirrojo'>Es pelirrojo?</option>";
echo "</select>";


echo "<br>";
echo "<br>";

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