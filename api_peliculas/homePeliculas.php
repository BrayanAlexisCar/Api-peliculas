<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Una API hecha en PHP donde se obtienen, agregan, editan y eliminan peliculas">
    <title>API de Peliculas</title>
    <link rel="icon" type="image/x-icon" href="img/clapperboard.png">
    <link rel="stylesheet" href="WEB/css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand fs-3 text-light fw-bold" href="index.php">API de Peliculas <i class="fa-solid fa-film "></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item bg-primary mt-3">
          <a class="nav-link active mx-5 fs-5 text-light" aria-current="page" href="homePeliculas.php">Peliculas</a>
        </li>
        <li class="nav-item bg-primary mt-3">
          <a class="nav-link active mx-3  fs-5 text-light" aria-current="page" href="homeCategorias.php">Categorias</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div id="contenPrincipal" class="container-fluid px-1 my-4 mt-5">
    <h2 class="text-center">Obtener, insertar, editar y eliminar películas.</h2>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 mx-auto">
            <div class="card shadow rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-auto d-flex">
                            <button type="button" class="btn btn-primary mt-3 mb-2 me-5" data-bs-toggle="modal" data-bs-target="#modalAgregarPelicula">
                                <i class="fa-solid fa-plus-square"></i> Agregar Nueva Película
                            </button>
                            <div class="input-group flex-nowrap mt-3 mb-2" style="width: 200px; height: 40px;">
                                <input type="search"  id="buscarPelicula"  class="form-control" placeholder="Buscar" onkeyup="buscar_pelicula()" aria-label="Buscar" aria-describedby="addon-wrapping" >
                            </div>
                            
                            <div class="">
     
                            </div>
                    </div>
                </div>
                <div class="card-body rounded-0">
                    <div class="table-responsive p-2">
                        <table id="memberTable" class="table table-striped table-bordered table-sm">
                            <colgroup>
                                <col width="5%">
                                <col width="20%">
                                <col width="20%">
                                <col width="10%">
                                <col width="35%">
                                <col width="15%">
                                <col width="15%">
                                <col width="8%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Director</th>
                                    <th class="text-center">Año</th>
                                    <th class="text-center d-none d-md-table-cell">Sinopsis</th>
                                    <th class="text-center">Categoría</th>
                                    <th class="text-center">Poster</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="peliculasTableBody">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center my-3">
            <button class="btn btn-primary" id="prevPage" onclick="cargarPeliculas(--currentPage)">Anterior</button>
            <span>Página <span id="currentPage">1</span></span>
            <button class="btn btn-primary" id="nextPage" onclick="cargarPeliculas(++currentPage)">Siguiente</button>
        </div>
    </div>
    
</div>

<!-- MODAL AGREGAR PELICULA -->
    <div class="modal fade" id="modalAgregarPelicula" aria-labelledby="PeliculasModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                <h1 class="modal-title fs-5 "> Agregar Pelicula</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                    <form action="" id="member-form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control rounded-0" name="nombre" id="nombre" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="director" class="form-label">Director</label>
                            <input type="text" class="form-control rounded-0" name="director" id="director" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="anio" class="form-label">Año</label>
                            <input type="number" class="form-control rounded-0" name="anio" id="anio" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="sinopsis" class="form-label">Sinopsis</label>
                            <input type="text" class="form-control rounded-0" name="sinopsis" id="sinopsis" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="id_categoria" class="form-label">Categoría</label>
                            <select id="id_categoria" name="id_categoria" class="form-select" required>
                                <!-- Opciones de categorías -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control rounded-0" name="imagen" id="imagen" accept="image/*" required>
                        </div>
                    </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="insertarPelicula()" class="btn btn-danger ">Guardar</button>
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    
<!-- MODAL ELIMINAR PELICULA -->
<div class="modal fade" id="modalEliminarPelicula" aria-labelledby="PeliculasModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header ">
                    <h1 class="modal-title fs-5 "> Eliminar Pelicula</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="container-fluid">
                        <form action="" id="member-form">
                            <input type="hidden" id="id_eliminar"  name="id_eliminar">
                            
                            <div class="mb-3">
                                <label for="eliminar" class="form-label fs-5">Esta seguro que desea eliminar esta pelicula?</label>
                               
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="eliminarPelicula()" class="btn btn-danger ">Eliminar</button>
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
 
    
<!-- MODAL EDITAR PELICULA -->
<div class="modal fade" id="modalEditarPelicula" aria-labelledby="PeliculasModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h1 class="modal-title fs-5">Editar Pelicula</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <form action="" id="member-form">
                            <div class="mb-3">
                                <label for="id_editar" class="form-label">ID Película</label>
                                <input type="text" class="form-control" id="id_editar" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control rounded-0" name="nombreActualizar" id="nombreActualizar" required="required">
                            </div>
                            <div class="mb-3">
                                <label for="director" class="form-label">Director</label>
                                <input type="text" class="form-control rounded-0" name="directorActualizar" id="directorActualizar" required="required">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Año</label>
                                <input rows="2" class="form-control rounded-0" name="anioActualizar" id="anioActualizar" required="required"></input>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">sinopsis</label>
                                <input rows="2" class="form-control rounded-0" name="sinopsisActualizar" id="sinopsisActualizar" required="required"></input>
                            </div>
                            <div class="mb-3">
                            <label for="idCategoriaActualizar" class="form-label">Categoría</label>
                                <select id="idCategoriaActualizar" class="form-select" required>
                                  
                                </select>
                            </div>
                            <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control rounded-0" name="imagen" id="imagenEditar" accept="image/*" required>
                            
                        </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="actualizarPelicula()" class="btn btn-success ">Editar</button>
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

<style>
.modal-title {
    text-transform: none; /* Evita que el texto se muestre en mayúsculas */
}

body{

    font-family: 'Roboto Mono', monospace;
}
</style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="WEB/scriptPelicula.js"></script>
</body>
</html>

