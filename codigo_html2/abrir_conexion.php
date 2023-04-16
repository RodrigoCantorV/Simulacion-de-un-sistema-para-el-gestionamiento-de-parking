<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "localhost";    // sera el valor de nuestra BD 
	$basededatos = "software2";    // sera el valor de nuestra BD 
	//$usuariodb = "UDEC";    // sera el valor de nuestra BD 
	//$clavedb = "123456";    // sera el valor de nuestra BD 
	$usuariodb = "root";    // sera el valor de nuestra BD 
	$clavedb = "";    // sera el valor de nuestra BD 
	//Lista de Tablas
	$tabla_db1 = "administrador"; 	   // tabla de administrador
	$tabla_db2 = "guarda"; 	   // tabla de celador
	$tabla_db3 = "estacionamiento"; 	   // tabla de celador
	$tabla_db4 = "perso_afue";
    $tabla_db5 = "udec_cod";
	$tabla_db6 = "num_solicitud";
	$tabla_db7 = "ingreso";
	$tabla_db8 = "usuarios";

	error_reporting(0); //No me muestra errores
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>