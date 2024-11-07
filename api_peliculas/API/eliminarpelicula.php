<?php 
    include 'DB/conexion.php';

    if (!empty($_POST['id_pelicula'])) {
        
        $id_pelicula = $_POST['id_pelicula'];
        
        try {
            $consulta = $base_de_datos->prepare("DELETE FROM pelicula WHERE id_pelicula = :id_p ");

            $consulta->bindParam(':id_p', $id_pelicula);
            $proceso = $consulta->execute();

            if( $proceso && $consulta->rowCount()!=0){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##DELETE"
                              ];
                echo json_encode($respuesta);
            }else{
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
    }else{
        $respuesta = [
                        'status' => false,
                        'mesagge' => "ERROR##DATOS##POST"
                      ];
        echo json_encode($respuesta);
    }
?>
