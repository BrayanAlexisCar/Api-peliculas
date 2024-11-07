
let categoriaTableBody;


window.onload = function() {
    categoriaTableBody = document.getElementById("categoriaTableBody");
    cargarCategorias();
}

let currentPage = 1;
const itemsPerPage = 5;

function cargarCategorias(page = 1) {
    
    currentPage = page;

    fetch(`http://localhost/api_peliculas/API/obtenerCategoriasPaginadas.php?page=${currentPage}&items_per_page=${itemsPerPage}`)
        .then(response => response.json())
        .then(data => {
            console.log("holaa"+ data)
            mostrarDatosEnHTML(data);
            document.getElementById('currentPage').innerText = currentPage;

            document.getElementById('prevPage').disabled = currentPage === 1;
            if (data.length < itemsPerPage) {
                document.getElementById('nextPage').disabled = true;
            } else {
                document.getElementById('nextPage').disabled = false;
            }
        })
        .catch(error => {
            console.error('Error al obtener las categorías:', error);
        });
}

function cerrarmodalAgregar(){
      
    const modalElement = document.getElementById("modalAgregarCategoria");
      const modal = bootstrap.Modal.getInstance(modalElement);
  
      
      if (modal) {
          modal.hide();
      }
}


function cerrarmodalEditar(){
      
    const modalElement = document.getElementById("modalEditarCategoria");
      const modal = bootstrap.Modal.getInstance(modalElement);
  
      
      if (modal) {
          modal.hide();
      }
}


function cerrarmodalEliminar(){
      
    const modalElement = document.getElementById("modalEliminarCategoria");
      const modal = bootstrap.Modal.getInstance(modalElement);
  
      
      if (modal) {
          modal.hide();
      }
}


    


function mostrarDatosEnHTML(data) {
  
    categoriaTableBody.innerHTML = ''; 


    let datosHTML = "";
    data.forEach(categoria => {
        datosHTML += `
        <tr>
            <td class="text-center">${categoria.id_categoria}</td>
            <td class="text-center">${categoria.nombre}</td>
            
            <td class="text-center">
                <button class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria" onclick="
                        document.getElementById('id_editar').value = ${categoria.id_categoria};
                        document.getElementById('nombreActualizar').value = '${categoria.nombre}';
                    "><i class="fa-solid fa-edit" title="Editar Categoria"></i></button>

                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarCategoria" onclick="document.getElementById('id_eliminar').value = ${categoria.id_categoria};"><i class="fa-solid fa-trash" title="Eliminar Categoria"></i></button>
            </td>
        </tr>
    `;
});


categoriaTableBody.innerHTML = datosHTML;
}


function insertarCategoria(){

  
    let nombre = document.getElementById("nombre").value;
    

    let datos = new FormData();
    datos.append("nombre", nombre);
 
    

    let configuracion = {
        method: "POST",
        body: datos
    };

    fetch("http://localhost/api_peliculas/API/insertarcategoria.php", configuracion)
    .then(res => res.json())
    .then(data => {
        console.log('Respuesta JSON servidor: ');
        console.log(data);
        document.getElementById("nombre").value = "";
        
        
       if(data.status ){
         alert('La categoria ha sido insertada');
         cerrarmodalAgregar();
         cargarCategorias();
       }else{
         alert('Error al insertar la categoria');
         cerrarmodalAgregar();
         cargarCategorias();
       }
        
       
    })
    .catch(error => {
        alert('Error al insertar la categoria:', error);
        console.error('Error al insertar la categoria :', error);
    });
}



function actualizarCategoria(){

    let id_categoria= document.getElementById("id_editar").value;
    let nombre= document.getElementById("nombreActualizar").value;
    

    let datos = new FormData();
    datos.append("id_categoria", id_categoria);
    datos.append("nombre", nombre);
 
    

    let configuracion = {
        method: "POST",
        body: datos
    };

    fetch("http://localhost/api_peliculas/API/actualizarcategoria.php", configuracion)
    .then(res => res.json())
    .then(data => {
        console.log('Respuesta JSON servidor: ');
        console.log(data);
        document.getElementById("nombreActualizar").value = "";
       

        if(data.status ){
            alert('La categoria ha sido editada');
            cerrarmodalEditar();
            cargarCategorias();
          }else{
            alert('Error al editar la categoria');
            cerrarmodalEditar();
            cargarCategorias();
          }
    })
    .catch(error => {
        console.error('Error al editar la categoria:', error);
        alert('Error al actualizar la categoria');
    });
}





function eliminarCategoria(){
    let id_categoria = document.getElementById("id_eliminar").value;

    let datos = new FormData();
    datos.append("id_categoria", id_categoria);
    

    let configuracion = {
        method: "POST",
        body: datos
    };

    fetch("http://localhost/api_peliculas/API/eliminarcategoria.php", configuracion)
    .then(res => res.json())
    .then(data => {
        console.log('Respuesta JSON servidor: ');
        console.log(data);
        document.getElementById("id_eliminar").value = "";
      
        if (data.status) {
            alert('La categoria ha sido eliminada');
            cerrarmodalEliminar();
            cargarCategorias(); 
        } else {
            alert('Error al eliminar la categoria ');
            cerrarmodalEliminar();
            cargarCategorias();
        }
    })
    .catch(error => {
        alert('La categoria no ha podido ser eliminada');
        console.error('Error al eliminar la categoria:', error);
    });
}

