<?php 
// while ($post = each($_POST))
// {
// echo $post[0] . " = " . $post[1];
// }
function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a[1] < $b[1]) ? -1 : 1;
}

$a = array(array("hola","3"),array("hola2","1"),array("hola1","10"));
$jamon = array(array("JamonesABuenPrecio","23"),array("JamonesABuenPrecio","1"),array("JamonesABuenPrecio","3"));
print_r($jamon);
usort($jamon, "cmp");

foreach ($jamon as $jamon => $b) {
    echo "$b[0]: $b[1]\n";
    echo "<br>";
}
function leerRanking(){
	$array_de_lineas = file("ranking.txt");
	$longitude_de_array = count($array_de_lineas);
	$array_persona = array();
	$array_nombres_puntuacion = array();
	for ($i=0; $i <$longitude_de_array ; $i++) { 
		$array_guardar = preg_split("/,/", $array_de_lineas[$i]);
		$x = $array_guardar[0];
		$y = $array_guardar[1];
		array_push($array_persona,$x); 
		array_push($array_persona,$y); 
		array_push($array_nombres_puntuacion, $array_persona);
		$array_persona = array();

	}
	// usort($array_nombres_puntuacion, 'sort_by_orden');

	usort($array_nombres_puntuacion, "cmp");
	foreach ($array_nombres_puntuacion as $array_nombres_puntuacion => $b) {
	    echo "$b[0]: $b[1]\n";
	    echo "<br>";
	}
		print_r($array_nombres_puntuacion);
	return $array_nombres_puntuacion;
	// $mapa[]=array('computadoras' => array('id' => '1','tipo' => 'R1'));
}


function escribirRanking(){
$file = fopen("ranking.txt", "a+");
fwrite($file, $_POST['añadirNombre'] .",". "33" .PHP_EOL);
fclose($file);

}
function ranking($array_nombres_puntuacion){
	$array = count($array_nombres_puntuacion);
	$count = 0;
	echo "<h4 align='center'>Ranking</h4>";
	echo"<table style='border:2px solid black' align='center'>";
	if ($count <=$array*2 ) {
	
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



}

escribirRanking();
$array_nombres_puntuacion = leerRanking();
ranking($array_nombres_puntuacion);
?>