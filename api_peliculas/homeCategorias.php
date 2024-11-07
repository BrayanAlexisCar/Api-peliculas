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
          <a class="nav-link active mx-5 fs-5 text-light " aria-current="page" href="homePeliculas.php">Peliculas</a>
        </li>
        <li class="nav-item bg-primary mt-3">
          <a class="nav-link active mx-3 fs-5 text-light" aria-current="page" href="homeCategorias.php">Categorias</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div id="contenPrincipal" class="container-fluid px-1 my-4 mt-5">
    <h2 class="text-center">Obtener, insertar, editar y eliminar categorías.</h2>
    <div class="row">
        <div class="col-lg-7 col-md-11 col-sm-12 mx-auto">
            <div class="card shadow rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#modalAgregarCategoria">
                                <i class="fa-solid fa-plus-square"></i> Agregar Nueva Categoría
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body rounded-0">
                    <div class="table-responsive p-2">
                        <table id="memberTable" class="table table-striped table-bordered table-sm">
                            <colgroup>
                                <col width="30%">
                                <col width="30%">
                                <col width="1%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="categoriaTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center my-3">
                <button class="btn btn-primary" id="prevPage" onclick="cargarCategorias(--currentPage)">Anterior</button>
                <span>Página <span id="currentPage">1</span></span>
                <button class="btn btn-primary" id="nextPage" onclick="cargarCategorias(++currentPage)">Siguiente</button>
            </div>
        </div>
    </div>



<!-- MODAL AGREGAR Categorias -->
    <div class="modal fade" id="modalAgregarCategoria" aria-labelledby="CategoriaModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                <h1 class="modal-title fs-5 "> Agregar Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <form action="" id="member-form">
                            <input type="hidden" name="id">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control rounded-0" name="Nombre" id="nombre" required="required">
                            </div>
                           
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="insertarCategoria()" class="btn btn-danger ">Guardar</button>
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    
<!-- MODAL ELIMINAR categoria -->
<div class="modal fade" id="modalEliminarCategoria" aria-labelledby="CategoriaModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header ">
                    <h1 class="modal-title fs-5 "> Eliminar Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="container-fluid">
                        <form action="" id="member-form">
                            <input type="hidden" id="id_eliminar"  name="id_eliminar">
                            <div class="mb-3">
                                <label for="eliminar" class="form-label fs-5">Esta seguro que desea eliminar esta Categoria?</label>
                               
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="eliminarCategoria()" class="btn btn-danger ">Eliminar</button>
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
 
    
<!-- MODAL EDITAR categoria -->
<div class="modal fade" id="modalEditarCategoria" aria-labelledby="CategoriaModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h1 class="modal-title fs-5">Editar Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <form action="" id="member-form">
                            <input type="hidden" id="id_editar" name="id_editar">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control rounded-0" name="nombreActualizar" id="nombreActualizar" required="required">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="actualizarCategoria()" class="btn btn-success ">Editar</button>
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
    <script src="WEB/scriptCategoria.js"></script>
</body>
</html>

