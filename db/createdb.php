<?php
require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php'); 

try{

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "CREATE TABLE locations (
		id 			INT AUTO_INCREMENT PRIMARY KEY,
		name		VARCHAR(255) NOT NULL,
		lat			DECIMAL (10,8) NOT NULL,
		lon			DECIMAL (11,8) NOT NULL,
		createdat	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		editat		TIMESTAMP NULL DEFAULT NULL
	)	DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB";

	$pdo->exec($sql);

	$sql = "CREATE TABLE tasks (
		id 			INT AUTO_INCREMENT PRIMARY KEY,
		id_location	INT,
		task 		VARCHAR(255) NOT NULL,
		level   	ENUM('1','2','3','4','5') NOT NULL DEFAULT '1',
		createdat	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		doneat 		TIMESTAMP NULL DEFAULT NULL,
		deletedat 	TIMESTAMP NULL DEFAULT NULL,

		FOREIGN KEY (id_location) REFERENCES locations(id)
			ON UPDATE CASCADE
			ON DELETE SET NULL

	) DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB";

	$pdo->exec($sql);

	


}catch(PDOException $e){
		die("No se ha podido crear la tabla 'tasks':". $e->getMessage());
}