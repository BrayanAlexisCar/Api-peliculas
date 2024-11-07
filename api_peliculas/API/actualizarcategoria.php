<?php 
    include 'DB/conexion.php';

    if (!empty($_POST['id_categoria'])) {

        $id_categoria = $_POST['id_categoria'];
        $nombre = $_POST['nombre'];
       

        try {
            $consulta = $base_de_datos->prepare("UPDATE categoria SET nombre=:nom WHERE id_categoria = :id_c");

            $consulta->bindParam(':nom', $nombre);
            $consulta->bindParam(':id_c', $id_categoria);
            
           
            
            $proceso = $consulta->execute();

            if( $proceso ){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##CATEGORIA##UPDATE"
                              ];
                echo json_encode($respuesta);
            }else{
                $respuesta = [
                                'status' => false,
                                'mesagge' => "ERROR##CATEGORIA##UPDATE"
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
