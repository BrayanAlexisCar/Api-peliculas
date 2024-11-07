
let peliculasTableBody

window.onload = function(){
    peliculasTableBody = document.getElementById("peliculasTableBody");
    cargarPeliculas(); 
    cargarCategoriasAgregar();
}

let currentPage = 1;
const itemsPerPage = 3;


function cargarPeliculas(page = 1) {
    currentPage = page;

    fetch(`http://localhost/api_peliculas/API/obtenerPeliculasPaginadas.php?page=${currentPage}&items_per_page=${itemsPerPage}`)
        .then(response => response.json())
        .then(data => {
            mostrarDatosEnHTML(data);
            document.getElementById('currentPage').innerText = currentPage;
            // se deshabilita  el botón "Anterior" si es  la primera página
            document.getElementById('prevPage').disabled = currentPage === 1;
            // y si no hay mas datos  el botón "Siguiente" tambien lo deshabilita
            if (data.length < itemsPerPage) {
                document.getElementById('nextPage').disabled = true;
            } else {
                document.getElementById('nextPage').disabled = false;
            }
        })
        .catch(error => {
            console.error('Error al obtener las películas:', error);
        });
}



function buscar_pelicula(){
    console.log('Función buscar_pelicula llamada');
    const query = document.getElementById('buscarPelicula').value.trim();
    
    if (query === '') {
        cargarPeliculas();  
    } else {
        fetch(`http://localhost/api_peliculas/API/obtenerPeliculaNombre.php?nombre=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            console.log('Respuesta JSON servidor: ', data);
            mostrarDatosEnHTML(data);  
        })
        .catch(error => {
            console.error('Error al encontrar la película:', error);
        });
    }
}


function cerrarmodalAgregar(){
      
    const modalElement = document.getElementById("modalAgregarPelicula");
      const modal = bootstrap.Modal.getInstance(modalElement);
  
      
      if (modal) {
          modal.hide();
      }
}




function cerrarmodalEliminar(){
      
    const modalElement = document.getElementById("modalEliminarPelicula");
      const modal = bootstrap.Modal.getInstance(modalElement);
  
      
      if (modal) {
          modal.hide();
      }
}

function cerrarmodalEditar(){
      
    const modalElement = document.getElementById("modalEditarPelicula");
      const modal = bootstrap.Modal.getInstance(modalElement);
  
      
      if (modal) {
          modal.hide();
      }
}
    
function mostrarDatosEnHTML(data) {
    peliculasTableBody.innerHTML = '';
    let datosHTML = "";
    data.forEach(pelicula => {
        datosHTML += `
        <tr>
            <td class="text-center">${pelicula.id_pelicula}</td>
            <td class="text-center">${pelicula.nombre}</td>
            <td class="text-center">${pelicula.director}</td>
            <td class="text-center">${pelicula.anio}</td>
            <td class="text-center">${pelicula.sinopsis}</td>
            <td class="text-center">${pelicula.nombre_categoria}</td>
            <td class="text-center">
               <img src="http://localhost/api_peliculas/img/${pelicula.imagen}" alt="${pelicula.nombre}" width="100">
            </td>
            <td class="text-center">
                <button class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#modalEditarPelicula" onclick="
                    document.getElementById('id_editar').value = ${pelicula.id_pelicula};
                    document.getElementById('nombreActualizar').value = '${pelicula.nombre}';
                    document.getElementById('directorActualizar').value = '${pelicula.director}';
                    document.getElementById('anioActualizar').value = '${pelicula.anio}';
                    document.getElementById('sinopsisActualizar').value = '${pelicula.sinopsis}';
                    cargarCategorias(${pelicula.id_categoria});
                    document.getElementById('imagenEditar').value = '${pelicula.imagen}';
                "><i class="fa-solid fa-edit" title="Editar Pelicula"></i></button>
                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarPelicula" onclick="document.getElementById('id_eliminar').value = ${pelicula.id_pelicula};"><i class="fa-solid fa-trash" title="Eliminar Pelicula"></i></button>
            </td>
        </tr>
        `;
    });
    peliculasTableBody.innerHTML = datosHTML; 
}

function insertarPelicula() {
    let nombre = document.getElementById("nombre").value;
    let director = document.getElementById("director").value;
    let anio = document.getElementById("anio").value;
    let sinopsis = document.getElementById("sinopsis").value;
    let id_categoria = document.getElementById("id_categoria").value;
    let imagen = document.getElementById("imagen").files[0];

    let datos = new FormData();
    datos.append("nombre", nombre);
    datos.append("director", director);
    datos.append("anio", anio);
    datos.append("sinopsis", sinopsis);
    datos.append("id_categoria", id_categoria);
    datos.append("imagen", imagen); 

    let configuracion = {
        method: "POST",
        body: datos
    };

    fetch("http://localhost/api_peliculas/API/insertarpelicula.php", configuracion)
    .then(res => res.json())
    .then(data => {
        console.log('Respuesta JSON servidor: ');
        console.log(data);
        document.getElementById("nombre").value = "";
        document.getElementById("director").value = "";
        document.getElementById("anio").value = "";
        document.getElementById("sinopsis").value = "";
        document.getElementById("id_categoria").value = "";
        document.getElementById("imagen").value = ""; 
        if (data.status) {
            alert('La película ha sido insertada');
            cerrarmodalAgregar();
            cargarPeliculas();
        } else {
            alert('Error al insertar la película');
            cerrarmodalAgregar();
            cargarPeliculas();
        }
    })
    .catch(error => {
        alert('Error al insertar la Película:', error);
        console.error('Error al insertar la película:', error);
    });


}


function actualizarPelicula(){

    let id_pelicula= document.getElementById("id_editar").value;
    let nombre= document.getElementById("nombreActualizar").value;
    let director = document.getElementById("directorActualizar").value;
    let anio = document.getElementById("anioActualizar").value;
    let sinopsis = document.getElementById("sinopsisActualizar").value;
    let id_categoria = document.getElementById("idCategoriaActualizar").value;
    let imagen = document.getElementById("imagenEditar").files[0]; 

    let datos = new FormData();
    datos.append("id_pelicula", id_pelicula);
    datos.append("nombre", nombre);
    datos.append("director", director);
    datos.append("anio", anio);
    datos.append("sinopsis", sinopsis);
    datos.append("id_categoria", id_categoria);
    datos.append("imagen", imagen);
    

    let configuracion = {
        method: "POST",
        body: datos
    };

    fetch("http://localhost/api_peliculas/API/actualizarpelicula.php", configuracion)
    .then(res => res.json())
    .then(data => {
        console.log('Respuesta JSON servidor: ');
        console.log(data);
        document.getElementById("nombreActualizar").value = "";
        document.getElementById("directorActualizar").value = "";
        document.getElementById("anioActualizar").value = "";
        document.getElementById("sinopsisActualizar").value = "";
        document.getElementById("idCategoriaActualizar").value = "";
        document.getElementById("imagenEditar").value = "";

        if(data.status ){
            alert('La pelicula ha sido editada');
            cerrarmodalEditar();
            cargarPeliculas();
          }else{
            alert('Error al editar la pelicula');
            cerrarmodalEditar();
            cargarPeliculas();
          }
    })
    .catch(error => {
        console.error('Error al editar la pelicula:', error);
        alert('Error al actualizar la pelicula');
    });
}





function eliminarPelicula(){
    let id_pelicula = document.getElementById("id_eliminar").value;

    let datos = new FormData();
    datos.append("id_pelicula", id_pelicula);

    let configuracion = {
        method: "POST",
        body: datos
    };

    fetch("http://localhost/api_peliculas/API/eliminarpelicula.php", configuracion)
    .then(res => res.json())
    .then(data => {
        console.log('Respuesta JSON servidor: ');
        console.log(data);
        document.getElementById("id_eliminar").value = "";
        if (data.status) {
            alert('La película ha sido eliminada');
            cerrarmodalEliminar();
            cargarPeliculas(); 
        } else {
            alert('Error al eliminar la película ');
            cerrarmodalEliminar();
            cargarPeliculas();
        }
    })
    .catch(error => {
        alert('La pelicula no ha podido ser eliminada');
        console.error('Error al eliminar la pelicula:', error);
    });
}



function cargarCategorias(id_categoria_actual) {

   
    const categoria_select = document.getElementById("idCategoriaActualizar");

    fetch("http://localhost/api_peliculas/API/obtenercategoria.php")
    .then(res => res.json())
    .then(data => {
        console.log('Respuesta JSON servidor: ');
        console.log(data);

       
        categoria_select.innerHTML = '';

        // Añadir las categoras al select
        data.forEach(categoria => {
            let option = document.createElement("option");
            option.value = categoria.id_categoria;
            option.text = ` ${categoria.nombre}`;

            if (categoria.id_categoria == id_categoria_actual) {
                option.selected = true;
            }
            categoria_select.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error al cargar las categorías:', error);
    });
}





function cargarCategoriasAgregar() {

   
    const categoria_select = document.getElementById("id_categoria");

    fetch("http://localhost/api_peliculas/API/obtenercategoria.php")
    .then(res => res.json())
    .then(data => {
        console.log('Respuesta JSON servidor agregar: ');
        console.log(data);

       
        categoria_select.innerHTML = '';

        // Añadir las categoras al select
        data.forEach(categoria => {
            let option = document.createElement("option");
            option.value = categoria.id_categoria;
            option.text = ` ${categoria.nombre}`;

           
            categoria_select.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error al cargar las categorías:', error);
    });
}




