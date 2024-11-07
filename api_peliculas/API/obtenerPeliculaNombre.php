<?php 
    include 'DB/conexion.php';
    header('Content-Type: application/json; charset=utf-8');


    // Obtener el parámetro 'nombre' de la query string
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

    if (!empty($nombre)) {
        // Consulta para buscar películas por nombre
        $consulta = $base_de_datos->prepare("SELECT * FROM pelicula WHERE nombre LIKE :nombre");
        $nombre = "%$nombre%";  // Añadir comodines para la búsqueda
        $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->execute();

        // Obtener los resultados
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        // Devolver los resultados como JSON
        echo json_encode($datos);
    } else {
        // Si no hay nombre proporcionado, devolver un array vacío
        echo json_encode([]);
    }
?>
