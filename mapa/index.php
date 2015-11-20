<?php 

require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php');

try {
	$sql = 'SELECT  locations.id ,locations.lat ,locations.lon ,locations.name ,tasks.task , tasks.id FROM locations join tasks on locations.id = tasks.id_location where doneat IS NULL AND deletedat IS NULL ';
	$ps = $pdo->prepare($sql);
	$ps->execute();

} catch (Exception $e) {
	die("No se ha podido extraer información de la base de datos:". $e->getMessage());
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$mapalocalizacion[] = $row;
}


require_once 'mapa.html.php';

