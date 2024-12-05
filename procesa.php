<?php
include_once 'pokemon.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$accion = $_POST['accion'];


	if ($accion == 'insert') {
    		$num = $_POST['numero'];
    		$nom = $_POST['nombre'];
    		$tip = $_POST['tipo'];
    		$fot = $_POST['foto'];

    		$pok = new Pokemon($nom,$tip,$fot,$num);

    		$pok->insertarEnBd();

    		header("Location: index.php");
    		exit();
	}
	elseif($accion == 'delete'){
		$num = $_POST['numero'];
		Pokemon::eliminarDeBd($num);
		header("Location: index.php");
		exit();
	}
	else{
		echo "Accion no reconocida";
	}
}
