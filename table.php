<html>
<style type="text/css">
	#tdd{
		margin-right: 50px;
		margin-top: 10px;
	}

		/*flip*/

	/*.container {
	    width: 220px;
	    height: 260px;
	    position: float-left;
	    -webkit-perspective: 800px;
	    -moz-perspective: 800px;
	    -o-perspective: 800px;
	    perspective: 800px;
	}
	.card {
	    width: 100%;
	    height: 100%;
	    position: absolute;
	    -webkit-transition: -webkit-transform 1s;
	    -moz-transition: -moz-transform 1s;
	    -o-transition: -o-transform 1s;
	    transition: transform 1s;
	    -webkit-transform-style: preserve-3d;
	    -moz-transform-style: preserve-3d;
	    -o-transform-style: preserve-3d;
	    transform-style: preserve-3d;
	    -webkit-transform-origin: 50% 50%;
	}
	.card div {
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    display: block;
	    height: 100%;
	    width: 100%;
	    line-height: 260px;
	    color: white;
	    text-align: center;
	    font-weight: bold;
	    font-size: 140px;
	    position: absolute;
	    -webkit-backface-visibility: hidden;
	    -moz-backface-visibility: hidden;
	    -o-backface-visibility: hidden;
	    backface-visibility: hidden;
	}
	.card .front {
	     
	}

	.card .back {
	   
	    -webkit-transform: rotateY( 180deg );
	    -moz-transform: rotateY( 180deg );
	    -o-transform: rotateY( 180deg );
	    transform: rotateY( 180deg );
	}
	.card.flipped {
	    -webkit-transform: rotateY( 180deg );
	    -moz-transform: rotateY( 180deg );
	    -o-transform: rotateY( 180deg );
	    transform: rotateY( 180deg );
	}
*/
	/*end flip*/

	.img {
	    max-width: 300px;
	    max-height: 300px;
	}
</style>

<?php  

$imageDir="";
$images=glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$imagenAzar=$images[array_rand($images)];

echo "<h4 align='center'>Carta del Servidor</h4>";

echo "<table style='border:2px solid black' align='center'";

echo "<tr><td style='border:1px solid black'><img src='$imagenAzar'></td></tr>";


echo "</table>";



echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$imageDir="";
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
			      <img class='img' src='assets/cartas/cardBack.jpg'/>
			    </div>
			  </div>
			</div></td>";
		$contador++;






		
		
	}
	echo "</tr>";
}

echo"</table>";




?>

</html>