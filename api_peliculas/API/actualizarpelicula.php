<?php 
include 'DB/conexion.php';

if (!empty($_POST['id_pelicula']) && !empty($_POST['nombre']) && !empty($_POST['director']) && !empty($_POST['anio']) && !empty($_POST['sinopsis']) && !empty($_POST['id_categoria'])) {

    $id_pelicula = $_POST['id_pelicula']; 
    $nombre = $_POST['nombre']; 
    $director = $_POST['director'];
    $anio = $_POST['anio'];
    $sinopsis = $_POST['sinopsis'];
    $id_categoria = $_POST['id_categoria'];

    
    $imagen = null;
    if (!empty($_FILES['imagen']['name'])) {
        $imagen = $_FILES['imagen']['name'];
        $temp = $_FILES['imagen']['tmp_name'];
        $carpeta = 'C:/xampp/htdocs/api_peliculas/img/'; 

        
        if (!move_uploaded_file($temp, $carpeta . $imagen)) {
            $respuesta = [
                'status' => false,
                'message' => "ERROR##SUBIDA##IMAGEN"
            ];
            echo json_encode($respuesta);
            exit; 
        }
    }

    try {
        
        if ($imagen) {
           
            $consulta = $base_de_datos->prepare("UPDATE pelicula SET nombre=:nom, director=:dir, anio=:ani, sinopsis=:sin, id_categoria=:id_c, imagen=:img WHERE id_pelicula = :id_p");
            $consulta->bindParam(':img', $imagen);
        } else {
            
            $consulta = $base_de_datos->prepare("UPDATE pelicula SET nombre=:nom, director=:dir, anio=:ani, sinopsis=:sin, id_categoria=:id_c WHERE id_pelicula = :id_p");
        }

       
        $consulta->bindParam(':id_p', $id_pelicula);
        $consulta->bindParam(':nom', $nombre);
        $consulta->bindParam(':dir', $director);
        $consulta->bindParam(':ani', $anio);
        $consulta->bindParam(':sin', $sinopsis);
        $consulta->bindParam(':id_c', $id_categoria);
        
        
        $proceso = $consulta->execute();

        
        if ($proceso) {
            $respuesta = [
                'status' => true,
                'message' => "OK##PELICULA##UPDATE"
            ];
        } else {
            $respuesta = [
                'status' => false,
                'message' => "ERROR##PELICULA##UPDATE"
            ];
        }
    } catch (Exception $e) {
        $respuesta = [
            'status' => false,
            'message' => "ERROR##SQL",
            'exception' => $e
        ];
    }

    echo json_encode($respuesta);
} else {
    $respuesta = [
        'status' => false,
        'message' => "ERROR##DATOS##POST"
    ];
    echo json_encode($respuesta);
}
?>
