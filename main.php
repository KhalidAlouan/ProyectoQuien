<html>
<head>
	<script type="text/javascript" defer src="funciones.js"></script>
	<link href="style.css" rel="stylesheet" type="text/css">


</head>
<body>
<audio id="audio" src="latigo.mp3"></audio>

<?php  

$imageDir="assets/cartas/";
$images=glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$imagenAzar=$images[array_rand($images)];

echo "<h4 align='center'>Carta del Servidor</h4>";

//Mostrar el contador de preguntas
echo "<p id='contador' align='right'> Has hecho: 0 preguntas </p>";

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
for ($i=1; $i <=4; $i++) { 
	echo "<tr>\n";
	for ($j=1; $j <=3; $j++) { 
		
		echo "<td style='border:1px solid black'>
			<div class='container'>
			  <div class='card' >
			    <div class='front'>
			      <img onclick='sonido' id='img'class='img' src='$image[$contador]'>
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

echo"<label id='gafas'> Tiene Gafas : </label>";
echo"<select id='combos'>";
echo"<option></option>";
echo"<option value='No'>No</option>";
echo"<option value='si'>Si</option>";
echo "</select>";


echo"<br>";

echo"<label id='s'> Sexo : </label>";
echo"<select  id='sexo'>";
echo"<option></option>";
echo"<option value='Hombre'>Hombre</option>";
echo"<option value='Mujer'>Mujer</option>";
echo "</select>";

echo"<br>";

echo"<label id='p'> Pelo : </label>";
echo"<select id='pelo'>";
echo"<option></option>";
echo"<option value='Moreno'>Moreno</option>";
echo"<option value='Rubio'>Rubio</option>";
echo"<option value='Pelirrojo'>Pelirrojo</option>";
echo "</select>";


echo "<br>";
echo "<br>";

echo "<input type='button' onclick='combo()'value='Fes la Pregunta'>";
echo"<br>";
echo "<br>";



echo "<textarea rows='4' cols='50' id='area'>";

echo "</textarea>";




?>
</body>
</html>