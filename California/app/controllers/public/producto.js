const API_PRODUCTOS = '../../app/api/dashboard/productos.php?action=';
const API_VALORACION = '../../app/api/dashboard/productos.php?action=';
const ENDPOINT_VALORACION = '../../app/api/dashboard/productos.php?action=Coments';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams(location.search);
    // Se obtienen los datos localizados por medio de las variables.
    const ID = params.get('id');
    // Se llama a la función que muestra el detalle del producto seleccionado previamente.
    readOneProducto(ID);
    verify(ID);
    searchRow2(ENDPOINT_VALORACION, ID);
});

// Función para obtener y mostrar los datos del producto seleccionado.
function readOneProducto(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);

    fetch(API_PRODUCTOS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se colocan los datos en la tarjeta de acuerdo al producto seleccionado previamente.
                    document.getElementById('imagen').setAttribute('src', '../../resources/img/productos/' + response.dataset.foto);
                    document.getElementById('nombre').textContent = response.dataset.nombre_producto;
                    document.getElementById('bread').textContent = response.dataset.nombre_producto;
                    document.getElementById('categoria').textContent = 'Categoria: ' + response.dataset.categoria;
                    document.getElementById('marca').textContent = 'Marca: ' + response.dataset.marca_producto;
                    document.getElementById('descripcion').textContent = response.dataset.descripcion_producto;
                    document.getElementById('precio').textContent = 'Precio: $' +  response.dataset.precio_producto;
                    document.getElementById('cantidad').setAttribute('max', response.dataset.cantidad_total);
                    // Se asignan los valores a los campos ocultos del formulario.
                    document.getElementById('id_producto').value = response.dataset.id_producto;
                } else {
                    // Se presenta un mensaje de error cuando no existen datos para mostrar.
                    document.getElementById('title').innerHTML = `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>`;
                    // Se limpia el contenido cuando no hay datos para mostrar.
                    document.getElementById('detalle').innerHTML = '';
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}
function verify(id){
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);
    
    fetch(API_VALORACION + 'verify', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    document.getElementById('boton').innerHTML = `<!-- Modal Trigger -->
                    <a class="waves-effect waves-light black btn modal-trigger" data-target="modal1">Agregar Comentario</a>`;
                } else {
                    // Se presenta un mensaje de error cuando no existen datos para mostrar.
                    //document.getElementById('boton').innerHTML = `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>`;
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}
// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <li class="collection-item avatar">
                            <!--Nombre-->
                <span class="title">${row.nombre_cliente+' '+row.apellido_cliente}</span>
                            <!--Comentario-->
                <p>${row.comentario}</p>
            </li>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}