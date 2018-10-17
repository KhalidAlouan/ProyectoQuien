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
			      <img class='img' src='$image[$contador]'>
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




?>
