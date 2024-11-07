<?php 
	include 'DB/conexion.php';
    header('Content-Type: application/json; charset=utf-8');
    $consulta = $base_de_datos->query("
   SELECT 
            pelicula.id_pelicula, 
            pelicula.nombre, 
            pelicula.director, 
            pelicula.anio, 
            pelicula.sinopsis,
            pelicula.id_categoria,
            pelicula.imagen,
            categoria.nombre  AS nombre_categoria
        FROM 
            pelicula  
        INNER JOIN 
            categoria ON pelicula.id_categoria = categoria.id_categoria 
        ORDER BY 
            pelicula.id_pelicula DESC");

    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);//sirve para evitar datos duplicados

    // Codifica los datos en UTF-8, para que se puedan convertir a Json sin problema (Ñ y tildes, caracteres especiales)
    $datos = mb_convert_encoding($datos, "UTF-8", "iso-8859-1");

    echo json_encode($datos);
?>