<?php
    include 'DB/conexion.php';
    header('Content-Type: application/json; charset=utf-8');

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $items_per_page = isset($_GET['items_per_page']) ? intval($_GET['items_per_page']) : 5;
    $offset = ($page - 1) * $items_per_page;

    $consulta = $base_de_datos->prepare("
        SELECT * FROM categoria ORDER BY id_categoria DESC LIMIT :limit OFFSET :offset
    ");
    $consulta->bindParam(':limit', $items_per_page, PDO::PARAM_INT);
    $consulta->bindParam(':offset', $offset, PDO::PARAM_INT);
    $consulta->execute();

    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $datos = mb_convert_encoding($datos, "UTF-8", "iso-8859-1");

    echo json_encode($datos);
?>
