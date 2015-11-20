<?php
require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php');


try {

	$sql = 'SELECT * FROM locations';
	$ps = $pdo->prepare($sql);
	$ps->execute();

} catch (Exception $e) {
	
	die("No se ha podido extraer información de la base de datos:". $e->getMessage());
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$localizaciones[] = $row;
}



if (isset($_GET['nuevalocalizacion'])) {

	$localizacion = htmlspecialchars($_POST['localizacion'], ENT_QUOTES, 'UTF-8');
	$latitud = htmlspecialchars($_POST['latitud'], ENT_QUOTES, 'UTF-8');
	$longitud = htmlspecialchars($_POST['longitud'], ENT_QUOTES, 'UTF-8');

	$validar = [];

	if ( $localizacion == "" ) {
		$validar['localizacion'] = 'Introduce una localizacion.';
	}

	if (!is_numeric($latitud)) {
		$validar['latitud'] = "Introduce una latitud";
	}

	if (!is_numeric($longitud)){
		$validar['longitud'] = "Introduce una longitud";
	}

	if (empty($validar)) {

		$sql = 'INSERT INTO locations (name , lat , lon) values (:localizacion , :latitud , :longitud) ';
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':localizacion', $localizacion);
		$ps->bindValue(':latitud', $latitud);
		$ps->bindValue(':longitud', $longitud);
		$ps->execute();

	}	

	header("Location: .");
	exit();
}


if (isset($_GET['borrarlocalizacion'])) {

	$id = htmlspecialchars($_POST['idlocalizacion'], ENT_QUOTES, 'UTF-8');

	$sql = 'DELETE FROM locations where id = :id';
	$ps = $pdo->prepare($sql);
	$ps->bindValue(':id', $id);
	$ps->execute();

	header("Location: .");
	exit();


}



require_once 'localizaciones.html.php';






