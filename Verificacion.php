<?php
	//Abre un fichero en el modo indicado
	$archivo = fopen("config/imatges.txt","r");
	
	//La funcion file lee el archivo y lo convierte en un array
	$array_de_lineas = file("config/imatges.txt");
	
	//Cuento los elemntos de un array
	$longitude_de_array = count($array_de_lineas);
	
	//Array para guardar las lineas sin el nombre de la imagen
	$array_sin_nombre = array();
	
	//Recorro el array de $array_de_lineas y separo cada linea por ":" y lo guardo en otra variable
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/:/", $array_de_lineas[$i]);
		$var_guardar_linea = $x[1];
		array_push($array_sin_nombre, $var_guardar_linea);
	}
	
	//Si la suma de los elementos del array es mas grande que la suma de los elementos unicos del mismo array
	//es que hay un valor o mas repetidos
	if (count($array_sin_nombre) > count(array_unique($array_sin_nombre))) {
		exit("ERROR: Hay caracterisitcas repetidas");
	}
	
	//Array para guardarme los nombres de las imagenes
	$array_nombres_imagenes = array();
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/:/", $array_de_lineas[$i]);
		$var_guardar_nombre = $x[0];
		array_push($array_nombres_imagenes, $var_guardar_nombre);
	}
	
	if (count($array_nombres_imagenes) > count(array_unique($array_nombres_imagenes))) {
		exit("ERROR: Hay imagenes repetidas");
	}
	
	//Abro el fichero en el modo indicado
	$archivo_config = fopen("config/config.txt", "r");
	
	//Lee el archivo y lo convierte en un array
	$array_caracterisitcas_config = file("config/config.txt");
	
	//Array para guardarme las caracterisitcas del config.txt sin Sexo,Pelo,Gafas
	$array_caracterisitcas_config_pura = array();
	
	//Contar la longitu de del array del fichero config
	$longitude_de_array_config = count($array_caracterisitcas_config);
	for ($i=0; $i <$longitude_de_array_config ; $i++) { 
		$x = preg_split("/:/", $array_caracterisitcas_config[$i]);
		$var_guardar_car = $x[0];
		array_push($array_caracterisitcas_config_pura, $var_guardar_car);
	}

	
	//Longitud del array sin nombres
	$long_array_sin_nombre = count($array_sin_nombre);
	
	//Array para guardar
	$array_aa = array();
	
	//Splitear por comas
	for ($i=0; $i <$long_array_sin_nombre; $i++) { 
		$x = preg_split("/,/", $array_sin_nombre[$i]);
		$var_guardar_linea = $x[0];
		array_push($array_aa, $var_guardar_linea);
	}

	//array para guardar el sexo
	$array_sexo = array();

	//contar la longitud del array aa
	$lon_array_aa = count($array_aa);

	for ($i=0; $i <$lon_array_aa ; $i++) { 
		$x = preg_split("/ /", $array_aa[$i]);
		$var_guardar_sexo = $x[1];
		array_push($array_sexo, $var_guardar_sexo);

	}


	$array_ab = array();

	for ($i=0; $i < count($array_sin_nombre) ; $i++) { 
		$x = preg_split("/,/", $array_sin_nombre[$i]);
		$var_guardar_linea = $x[1];
		array_push($array_ab, $var_guardar_linea);
	}



	$array_pelo = array();

	for ($i=0; $i <(count($array_ab)) ; $i++) { 
		$x = preg_split("/ /", $array_ab[$i]);
		$var_guardar_pelo = $x[1];
		array_push($array_pelo, $var_guardar_pelo);

	}

	$array_ac = array();

	for ($i=0; $i <$long_array_sin_nombre; $i++) { 
		$x = preg_split("/,/", $array_sin_nombre[$i]);
		$var_guardar_linea = $x[2];
		array_push($array_ac, $var_guardar_linea);
	}

	$array_gafas = array();

	for ($i=0; $i <count($array_ac) ; $i++) { 
		$x = preg_split("/ /", $array_ac[$i]);
		$var_guardar_gafas = $x[1];
		array_push($array_gafas, $var_guardar_gafas);
	}

	
	echo "<br>";


	$array_config = file("config/config.txt");


	$array_config_separada = array();

	for ($i=0; $i <count($array_config) ; $i++) { 
		$x = preg_split("/:/", $array_config[$i]);
		$var_guardar_atr_config = $x[0];
		array_push($array_config_separada, $var_guardar_atr_config);
	}

	//Recorrer el array de sexos para ver si todos los elemtnos son iguales que el atributo del config.txt

	foreach ($array_sexo as $key) {
		if ($key != $array_config_separada[0] ) {
			exit("ERROR: Hay caracterisitcas que no coinciden");
		}
	}

	foreach ($array_pelo as $key) {
		if ($key != $array_config_separada[1] ) {
			exit("ERROR: Hay caracterisitcas que no coinciden");

		}
	}

	foreach ($array_gafas as $key) {
		if ($key != $array_config_separada[2] ) {
			exit("ERROR: Hay caracterisitcas que no coinciden");

		}
	}

	
	//Si el programa ha llegado hasta aqui redirecciona hacia el main.php
	header("Location: main.php");


	
?>
