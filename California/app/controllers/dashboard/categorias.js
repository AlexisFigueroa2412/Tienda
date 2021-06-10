// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_ADMIN = '../../app/api/dashboard/categorias.php?action=';
const ENDPOINT_CATEGORIA = '../../app/api/dashboard/categorias.php?action=readAll';
const ENDPOINT_SUB = '../../app/api/dashboard/categorias.php?action=readAllSub';
const ENDPOINT_NEW = '../../app/api/dashboard/categorias.php?action=readAllNew';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_ADMIN);
});


// ---------------------------- Tablas de inicio ------------------------------------


    //--------Categorías

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>         
                <td>${row.id_categoria}</td>                       
                <td>${row.categoria}</td>
                <td>
                    <a href="../../app/reports/dashboard/productos_categoria.php?id=${row.id_categoria}" target="_blank" class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0 tooltipped" data-tooltip="Reporte de productos"><i class="material-icons black-text">assignment</i></a>
                    <a href="#" onclick="openDeleteDialogCat(${row.id_categoria})" class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0 tooltipped" data-tooltip="Eliminar"><i class="material-icons black-text">delete</i></a>
                    <a href="#" onclick="openUpdateDialogCat(${row.id_categoria})" class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0 tooltipped" data-tooltip="Editar"><i class="material-icons black-text">mode_edit</i></a>                 
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}


//---------------------------- Formularios de Busqueda ------------------------------------

    //--------Categorías

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_ADMIN, 'search-form');
});


//---------------------------- Modal crear ------------------------------------

    //--------Categorías

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialogCat() {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Agregar nueva categoría';
    // Se asigna el título para la caja de dialogo (modal).
}


//---------------------------- Modal Actualizar ------------------------------------

    //--------Categorías

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialogCat(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar categoría';

    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_categoria', id);

    fetch(API_ADMIN + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_categoria').value = response.dataset.id_categoria;
                    document.getElementById('txtCategoria').value = response.dataset.categoria;
                    // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                    M.updateTextFields();
                } else {
                    sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

//---------------------------- Ejecucción de Formularios ------------------------------------

    //--------Categorías

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('id_categoria').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_ADMIN, action, 'save-form', 'save-modal');
});


//---------------------------- Borrar Registro ------------------------------------

    //--------Categorías

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialogCat(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_categoria', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_ADMIN, data);
}
