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
        <a class="fw-bold fs-5" href="indexcategoria.php">Ir a API-Categoria</a>
		<a style class="fw-bold fs-5 mx-5" href="homePeliculas.php">Ir a Crud - Peliculas</a>
    </div>
    
    <div class="container">
        <h1 class="fs-1" >API de Peliculas</h1>
        <ul id="endpoint-list">

        	<li class="mt-5 mb-5">
        		<h4 style="margin-top: 10px;margin-bottom: 10px;">EndPoint: <span class="endpoint-name"> <a href="./API/obtenerpelicula.php">API/obtenerpelicula.php</a> </span></h4>
        		<h5>Metodo: GET</h5>
        		<h5>Parametros:</h5>
        		<ul class="input-list ">
        			<li></li>
        		</ul>
        		<h5 style="padding-top:5px;">Salida: JSON</h5>
        		<div style="padding-left: 30px; padding-top:5px; padding-bottom:5px;">
					<h5 style="padding-top:5px;">Lista de Peliculas:</h5>
					<pre>&nbsp;&nbsp;[<br>&nbsp;&nbsp;&nbsp;&nbsp;{
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id_pelicula": "1",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"nombre": "Baastardos sin gloria",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Director": "Quentin Tarantino",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"año": "2009",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Sinopsis": "Es el primer aÃ±o de la ocupaciÃ³n alemana de Francia. El oficial aliado, teniente Aldo Raine, ensambla un equipo de soldados judÃ­os para cometer actos violentos en contra de los nazis, incluyendo la toma de cabelleras. Ãl y sus hombres unen fuerzas con Bridget von Hammersmark, una actriz alemana y agente encubierto, para derrocar a los li­deres del Tercer Reich. Sus destinos convergen con la dueÃ±a d.",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id_categoria": "2",
						<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"imagen": "imagen.jpg",
						<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"nombre_categoria": "guerra"
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;},
                        &nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;{
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id_pelicula": "2",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"nombre": "Requiem for a dream",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Director": "Darren Aronofsky",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"año": "2001",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Sinopsis": "Una envejecida viuda se vuelve adicta a pÃ­ldoras dietÃ©ticas mientras su hijo libra su propia batalla con estupefacientes.",
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id_categoria": "1",
						<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"imagen": "imagen.jpg",
						<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"nombre_categoria": "drama"
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
                    <br>&nbsp;&nbsp;]</pre>
        		</div>
        	</li>
    </div>

    <div class="container">

        	<li class="mt-5 mb-5">
        		<h4 style="margin-top: 10px;margin-bottom: 10px;">EndPoint: <span class="endpoint-name"> <a href="./API/insertarpelicula.php">API/insertarpelicula.php</a> </span></h4>
        		<h5>Metodo: POST</h5>
        		<h5>Parametros:</h5>
        		<ul class="input-list">
        			<li><i><b>String</b></i> nombre</li>
					<li><i><b>String</b></i> director</li>
					<li><i><b>String</b></i> año</li>
					<li><i><b>String</b></i> sinopsis</li>
					<li><i><b>int</b></i> id_categoria</li>
					
        		</ul>
        		<h5 style="padding-top:5px;">Salida: JSON</h5>
        		<div style="padding-left: 30px; padding-top:5px; padding-bottom:5px;">
					<h5 style="padding-top:5px;">Pelicula actualizada:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": true,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "OK##PELICULA##INSERT"<br>&nbsp;&nbsp;}</pre>

					<h5 style="padding-top:5px;">Error en parametros:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##DATOS##POST"<br>&nbsp;&nbsp;}</pre>

					<h5 style="padding-top:5px;">Error en actualizacion:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##PELICULA##INSERT"<br>&nbsp;&nbsp;}</pre>
        		</div>
        	</li>

        	<li class="mt-5 mb-5">
        		<h4 style="margin-top: 10px;margin-bottom: 10px;">EndPoint: <span class="endpoint-name"> <a href="./API/actualizarpelicula.php">API/actualizarpelicula.php</a> </span></h4>
        		<h5>Metodo: POST</h5>
        		<h5>Parametros:</h5>
        		<ul class="input-list">
                    <li><i><b>String</b></i> nombre</li>
					<li><i><b>String</b></i> director</li>
					<li><i><b>String</b></i> año</li>
					<li><i><b>String</b></i> sinopsis</li>
					<li><i><b>int</b></i> id_categoria</li>
        		</ul>
        		<h5 style="padding-top:5px;">Salida: JSON</h5>
        		<div style="padding-left: 30px; padding-top:5px; padding-bottom:5px;">
					<h5 style="padding-top:5px;">Pelicula actualizada:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": true,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "OK##PELICULA##UPDATE"<br>&nbsp;&nbsp;}</pre>

					<h5 style="padding-top:5px;">Error en parametros:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##DATOS##POST"<br>&nbsp;&nbsp;}</pre>

					<h5 style="padding-top:5px;">Error en actualizacion:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##PELICULA##UPDATE"<br>&nbsp;&nbsp;}</pre>
        		</div>
        	</li>
    </div>

    <div class="container">
        	<li class="mt-5 mb-5">
        		<h4 style="margin-top: 10px;margin-bottom: 10px;">EndPoint: <span class="endpoint-name"> <a href="./API/eliminarpelicula.php">API/eliminarpelicula.php</a> </span></h4>
        		<h5>Metodo: POST</h5>
        		<h5>Parametros:</h5>
        		<ul class="input-list">
        			<li><i><b>String</b></i> nombre</li>
        		</ul>
        		<h5 style="padding-top:5px;">Salida: JSON</h5>
        		<div style="padding-left: 30px; padding-top:5px; padding-bottom:5px;">
					<h5 style="padding-top:5px;">Pelicula eliminada:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": true,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "OK##DELETE"<br>&nbsp;&nbsp;}</pre>

					<h5 style="padding-top:5px;">Error en parametros:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##DATOS##POST"<br>&nbsp;&nbsp;}</pre>

					<h5 style="padding-top:5px;">Error en eliminacion:</h5>
					<pre>&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;"status": false,<br>&nbsp;&nbsp;&nbsp;&nbsp;"message": "ERROR##DELETE"<br>&nbsp;&nbsp;}</pre>
        		</div>
        	</li>


            </ul>
        </div>
    </div>


    <script src="WEB/js/script.js"></script>
</body>
</html>

