<?php 
include 'DB/conexion.php';

if (!empty($_POST['id_categoria'])) { 
    $id_categoria = $_POST['id_categoria'];

    try {
        $consulta = $base_de_datos->prepare("DELETE FROM categoria WHERE id_categoria = :id_categoria");
        $consulta->bindParam(':id_categoria', $id_categoria);
        $proceso = $consulta->execute();

        if ($proceso && $consulta->rowCount() != 0) {
            $respuesta = [
                'status' => true,
                'mesagge' => "OK##DELETE"
            ];
            echo json_encode($respuesta);
        } else {
            $respuesta = [
                'status' => false,
                'mesagge' => "ERROR##DELETE"
            ];
            echo json_encode($respuesta);
        }
    } catch (Exception $e) {
        $respuesta = [
            'status' => false,
            'mesagge' => "ERROR##SQL",
            'exception' => $e
        ];
        echo json_encode($respuesta);
    }
} else {
    $respuesta = [
        'status' => false,
        'mesagge' => "ERROR##DATOS##POST"
    ];
    echo json_encode($respuesta);
}
?>