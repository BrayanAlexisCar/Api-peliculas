<?php 
	include 'DB/conexion.php';

    $consulta = $base_de_datos->query("SELECT * FROM categoria ORDER BY id_categoria DESC");
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);//sirve para evitar datos duplicados

    // Codifica los datos en UTF-8, para que se puedan convertir a Json sin problema (Ñ y tildes, caracteres especiales)
    $datos = mb_convert_encoding($datos, "UTF-8", "iso-8859-1");

    echo json_encode($datos);
?>