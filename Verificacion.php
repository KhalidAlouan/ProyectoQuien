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
	}

	//Array para guardarme los nombres de las imagenes
	$array_nombres_imagenes = array();


	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$x = preg_split("/:/", $array_de_lineas[$i]);
		$var_guardar_nombre = $x[0];
		array_push($array_nombres_imagenes, $var_guardar_nombre);
	}

	if (count($array_nombres_imagenes) > count(array_unique($array_nombres_imagenes))) {
		echo "Hay repetidos";
	}

	

	//Abro el fichero en el modo indicado
	$archivo_config = fopen("config.txt", "r");

	//Lee el archivo y lo convierte en un array
	$array_caracterisitcas_config = file("config.txt");

	//Array para guardarme las caracterisitcas del config.txt sin Sexo,Pelo,Gafas
	$array_caracterisitcas_config_pura = array();

	//Contar la longitude del array del fichero config
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

	print_r($array_aa);
	

?>
