<html>
<head>
</head>
<body>
<?php 
$array = 0;
function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a[1] < $b[1]) ? -1 : 1;
}

function leerRanking(){
	global $array;
	$array_de_lineas = file("ranking.txt");
	$longitude_de_array = count($array_de_lineas);
	$array_persona = array();
	$array_nombres_puntuacion = array();

	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$array_guardar = preg_split("/,/", $array_de_lineas[$i]);
		$x = $array_guardar[0];
		$y = intval($array_guardar[1]);
		array_push($array_persona,$x); 
		array_push($array_persona,$y); 
		array_push($array_nombres_puntuacion, $array_persona);
		$array_persona = array();

	}
	  $array = count($array_nombres_puntuacion);
	usort($array_nombres_puntuacion, "cmp");

	return $array_nombres_puntuacion;
	// $mapa[]=array('computadoras' => array('id' => '1','tipo' => 'R1'));
}


function escribirRanking(){
$file = fopen("ranking.txt", "a+");
fwrite($file, $_POST['añadirNombre'] .",". $_POST['contador'] .PHP_EOL);
fclose($file);

}
function ranking($array_nombres_puntuacion){
		global $array;

	$count = 0;
	echo "<h4 align='center'>Ranking</h4>";
	echo"<table style='border:2px solid black' align='center'>";
	if ($count <=$array) {
	
		for ($i=1; $i <=$array; $i++) { 
			echo "<tr>\n";
			for ($j=1; $j <=2; $j++) { 
				$x = $j-1;
				echo "<td style='border:1px solid black'>";
				echo $array_nombres_puntuacion[$count][$x];
				echo"</td>";
				
			}
			$count++;
			echo "</tr>";

		}
	}
	echo"</table>";

	$array = 0;

}

escribirRanking();
$array_nombres_puntuacion = leerRanking();
ranking($array_nombres_puntuacion);

echo "<a href='destroy.php'> Volver a jugar</a>";

?>
</body>
</html>