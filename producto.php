<?php
	include 'conexion.php';

	$producto = $_POST["producto"];
	$precio = $_POST["precio"];
	$stock = $_POST["stock"];

	$conexion = new Conexion();
	$cnn = $conexion->getConexion();
	$sql = "INSERT INTO producto (producto, stock, precio) VALUES (?,?,?);";
	$statement = $cnn->prepare( $sql );
	//Enlazar los parámetros de la consulta con los valores del formulario
	$statement->bindParam(1, $producto, PDO::PARAM_STR );
	$statement->bindParam(2, $stock, PDO::PARAM_INT );
	$statement->bindParam(3, $precio, PDO::PARAM_INT );

	echo $statement->execute() ? "Se registró." : "Error";

	//vaciar memoria
	$statement->closeCursor();
	$conexion = null;

	/*echo "Servidor: Datos obtenidos del Formulario <br>";
	echo "Producto: $producto <br>";
	echo "Precio: $precio <br>";
	echo "Stock: $stock <br>";*/