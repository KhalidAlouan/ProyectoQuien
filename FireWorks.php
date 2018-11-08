<!DOCTYPE html>
<html>
<head>
	<link href="FireWorks.css" rel="stylesheet" type="text/css">
	<title></title>
</head>
<body>
<?php
	$nombre = $_POST['añadirNombre'];
	$cont = $_POST['contador'];
	echo "<div class='pyro'>";
	  echo "<div class='before'></div>";
	  echo "<div class='after'></div>";
	  echo "<h1 id='h1'> ¡ Has Ganado !</h1>";
	  echo"<form action='ranking.php' method='post'>";
	  echo"        <input type='hidden' id='añadirNombre'type='text' name='añadirNombre' value ='$nombre'>";
	  echo"        <input type='hidden' id='texto' name='contador' type='text' value = '$cont' >";
	  echo"        <input id='opcion'type='submit' value='Ir al ranking'>";
	  echo"</form>";

?>
</div>
</body>
</html>
