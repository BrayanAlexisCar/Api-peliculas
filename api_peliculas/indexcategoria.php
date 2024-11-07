<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Una API para la gestión de personas, donde se pueden realizar las acciones de obtener, insertar, actualizar y eliminar.">
    <title>API de Peliculas</title>
    <link rel="icon" type="image/x-icon" href="img/clapperboard.png">
    <link rel="stylesheet" href="WEB/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <a class="fw-bold fs-5" class="center" href="index.php">Ir a API-Peliculas</a>
    </div>

        <div class="container">
            <h2 class="text-center mt-5 fs-1">  CATEGORIA</h2>

            <ul id="endpoint-list">

                <li class="mt-5 mb-5">
                    <h4 style="margin-top: 10px;margin-bottom: 10px;">EndPoint: <span class="endpoint-name"> <a href="./API/obtenercategoria.php">API/obtenercategoria.php</a> </span></h4>
                    <h5>Metodo: GET</h5>
                    <h5>Parametros:</h5>
                    <ul class="input-list">
                        <li></li>
                    </ul>
                    <h5 style="padding-top:5px;">Salida: JSON</h5>
                    <div style="padding-left: 30px; padding-top:5px; padding-bottom:5px;">
                        <h5 style="padding-top:5px;">Lista de categorias:</h5>
                        <pre>&nbsp;&nbsp;[<br>&nbsp;&nbsp;&nbsp;&nbsp;{
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id_categoria": "1",
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"nombre": "Suspenso",
                            <br>},
                            &nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;{
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id_categoria": "2",
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"nombre": "Guerra",
                            <br>},
                            &nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;{
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id_categoria": "3",
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"nombre": "Terror",
                            <br>}
                            
                        <br>&nbsp;&nbsp;]</pre>
                    </div>
                </li>
        </div>


        <div class="container">        
                <li class="mt-5 mb-5">
                    <h4 style="margin-top: 10px;margin-bottom: 10px;">EndPoint: <span class="endpoint-name"> <a href="./API/insertarcategoria.php">API/insertarcategoria.php</a> </span></h4>
                    <h5>Metodo: POST</h5>
                    <h5>Parametros:</h5>
                    <ul class="input-list">
                        <li><i><b>String</b></i> nombre</li>
                        
                        
                    </ul>
                    <h5 style="padding-top:5px;">Salida: JSON</h5>
                    <div style="padding-left: 30px; padding-top:5px; padding-bottom:5px;">
                        <h5 style="padding-top:5px;">Categoria actualizada:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": true,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "OK##CATEGORIA##INSERT"<br>&nbsp;&nbsp;}</pre>

                        <h5 style="padding-top:5px;">Error en parametros:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##DATOS##POST"<br>&nbsp;&nbsp;}</pre>

                        <h5 style="padding-top:5px;">Error en actualizacion:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##CATEGORIA##INSERT"<br>&nbsp;&nbsp;}</pre>
                    </div>
                </li>
        </div>


        <div class="container">  
                <li class="mt-5 mb-5">
                    <h4 style="margin-top: 10px;margin-bottom: 10px;">EndPoint: <span class="endpoint-name"> <a href="./API/actualizarcategoria.php">API/actualizarcategoria.php</a> </span></h4>
                    <h5>Metodo: POST</h5>
                    <h5>Parametros:</h5>
                    <ul class="input-list">
                        <li><i><b>String</b></i> nombre</li>
                        
                    </ul>
                    <h5 style="padding-top:5px;">Salida: JSON</h5>
                    <div style="padding-left: 30px; padding-top:5px; padding-bottom:5px;">
                        <h5 style="padding-top:5px;">Categoria actualizada:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": true,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "OK##CATEGORIA##UPDATE"<br>&nbsp;&nbsp;}</pre>

                        <h5 style="padding-top:5px;">Error en parametros:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##DATOS##POST"<br>&nbsp;&nbsp;}</pre>

                        <h5 style="padding-top:5px;">Error en actualizacion:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##CATEGORIA##UPDATE"<br>&nbsp;&nbsp;}</pre>
                    </div>
                </li>

        </div>

        <div class="container">  
                <li class="mt-5 mb-5">
                    <h4 style="margin-top: 10px;margin-bottom: 10px;">EndPoint: <span class="endpoint-name"> <a href="./API/eliminarcategoria.php">API/eliminarcategoria.php</a> </span></h4>
                    <h5>Metodo: POST</h5>
                    <h5>Parametros:</h5>
                    <ul class="input-list">
                        <li><i><b>String</b></i> nombre</li>
                    </ul>
                    <h5 style="padding-top:5px;">Salida: JSON</h5>
                    <div style="padding-left: 30px; padding-top:5px; padding-bottom:5px;">
                        <h5 style="padding-top:5px;">Categoria eliminada:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": true,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "OK##DELETE"<br>&nbsp;&nbsp;}</pre>

                        <h5 style="padding-top:5px;">Error en parametros:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##DATOS##POST"<br>&nbsp;&nbsp;}</pre>

                        <h5 style="padding-top:5px;">Error en eliminacion:</h5>
                        <pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##DELETE"<br>&nbsp;&nbsp;}</pre>
                    </div>
                </li>

            </ul>
        </div>
   

    <script src="WEB/js/script.js"></script>
</body>
</html>

