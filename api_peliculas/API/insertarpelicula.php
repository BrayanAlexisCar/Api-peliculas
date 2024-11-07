<?php
include 'DB/conexion.php';

if (!empty($_POST['nombre']) && !empty($_POST['director']) && !empty($_POST['anio']) && !empty($_POST['sinopsis']) && !empty($_POST['id_categoria']) && !empty($_FILES['imagen'])) {
    $nombre = $_POST['nombre'];
    $director = $_POST['director'];
    $anio = $_POST['anio'];
    $sinopsis = $_POST['sinopsis'];
    $id_categoria = $_POST['id_categoria'];

  
    $imagen = $_FILES['imagen']['name'];
    $temp = $_FILES['imagen']['tmp_name'];
    $carpeta = 'C:/xampp/htdocs/api_peliculas/img/'; 

    
    if (move_uploaded_file($temp, $carpeta . $imagen)) {
        try {
            $consulta = $base_de_datos->prepare("INSERT INTO pelicula (nombre, director, anio, sinopsis, id_categoria, imagen) VALUES (:nom, :dir, :ani, :sin, :id_c, :img)");
            $consulta->bindParam(':nom', $nombre);
            $consulta->bindParam(':dir', $director);
            $consulta->bindParam(':ani', $anio);
            $consulta->bindParam(':sin', $sinopsis);
            $consulta->bindParam(':id_c', $id_categoria);
            $consulta->bindParam(':img', $imagen);

            $proceso = $consulta->execute();
            if ($proceso && $consulta->rowCount() != 0) {
                $respuesta = [
                    'status' => true,
                    'message' => "OK##PELICULA##INSERT"
                ];
                echo json_encode($respuesta);
            } else {
                $respuesta = [
                    'status' => false,
                    'message' => "ERROR##PELICULA##INSERT"
                ];
                echo json_encode($respuesta);
            }
        } catch (Exception $e) {
            $respuesta = [
                'status' => false,
                'message' => "ERROR##SQL",
                'exception' => $e
            ];
            echo json_encode($respuesta);
        }
    } else {
        $respuesta = [
            'status' => false,
            'message' => "ERROR##SUBIDA##IMAGEN"
        ];
        echo json_encode($respuesta);
    }
} else {
    $respuesta = [
        'status' => false,
        'message' => "ERROR##DATOS##POST"
    ];
    echo json_encode($respuesta);
}
?>
