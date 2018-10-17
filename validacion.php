<?php
	//Abre un fichero en el modo indicado
	$archivo = fopen("imatges.txt","r");

	//La funcion file lee el archivo y lo convierte en un array
	$array_de_lineas = file("imatges.txt");

	//Cuento los elemntos de un array
	$longitude_de_array = count($array_de_lineas);

	//Array para guardar las lineas sin el nombre de la imagen
	$array_sin_nombre = array();

	

	//Recorro la array de $array_de_lineas y separo cada linea por ":" y lo guardo en otra variable
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/:/", $array_de_lineas[$i]);
		$var_guardar_linea = $x[1];
		array_push($array_sin_nombre, $var_guardar_linea);


	}

	//Si la suma de los elementos del array es mas grande que la suma de los elementos unicos es que hay un valor o mas repetido
	if (count($array_sin_nombre) > count(array_unique($array_sin_nombre))) {
		echo "Hay repetidos";
	} else {
		echo "No hay";
	}


	/*foreach ($array_de_lineas as $key) {
		echo $key;
	}*/		

	/*echo "<br>";

		echo "<br>";
		$x = preg_split("/:/", $array_de_lineas[0]);
		echo $x[1];
		echo "<br>";
		echo $array_de_lineas[0];
*/



	

	/*foreach ($array_de_lineas as $valor) {
		foreach ($array_de_lineas as $valor2) {
			if ($valor == $valor2) {
				echo "error";
			}
		}
	}
	*/


?>