 <script type="text/javascript" defer src="funciones.js"></script>
 <link href="style.css" rel="stylesheet" type="text/css">


<?php  

$imageDir="assets/cartas/";
$images=glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$imagenAzar=$images[array_rand($images)];

echo "<h4 align='center'>Carta del Servidor</h4>";

echo "<table style='border:2px solid black' align='center'";

echo "<tr><td style='border:1px solid black'>
<div class='container'>
 <div id = 'servCard'class='card' >
    <div class='front'>
          <img class='img' src='assets/reverso/cardBack.jpg'/>
    </div>
    <div class='back'>
          	<img class='img' src='$imagenAzar'>
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

$imageDir="assets/cartas/";
$image=glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

shuffle($image);

echo "<h4 align='center'>Cartas del Cliente</h4>";
echo"<table style='border:2px solid black' align='center'>";
$contador = 0;
for ($i=1; $i <=3; $i++) { 
	echo "<tr>\n";
	for ($j=1; $j <=4; $j++) { 
		
		echo "<td style='border:1px solid black'>
			<div class='container'>
			  <div class='card' >
			    <div class='front'>
			      <img  id='img'class='img' src='$image[$contador]'>
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

echo"<label> Tiene Gafas? : </label>";

echo"<select class='combo'>";
	echo"<option>-Selecciona una Opción-</option>";
	echo"<option value='No'>No</option>";
	echo"<option value='si'>Si</option>";
echo "</select>";

echo"<br>";

echo"<label> Que sexo tiene? : </label>";

echo"<select class='combo'>";
	echo"<option>-Selecciona una Opción</option>";
	echo"<option value='Hombre'>Hombre</option>";
	echo"<option value='Mujer'>Mujer</option>";
echo "</select>";

echo"<br>";

echo"<label> Que color de pelo tiene? : </label>";

echo"<select class='combo'>";
	echo"<option>-Selecciona una Opción</option>";
	echo"<option value='Moreno'>Moreno</option>";
	echo"<option value='Rubio'>Rubio</option>";
	echo"<option value='Pelirrojo'>Pelirrojo</option>";
echo "</select>";

echo "<br>";
echo "<br>";

echo "<input type='button' value='Fes la Pregunta'>";

echo"<br>";
echo"<br>";

echo "<textarea rows='4' cols='50'>";
echo "</textarea>";



?>
