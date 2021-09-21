// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../app/api/dashboard/usuarios.php?action=';
const ENDPOINT_USUARIOS = '../../app/api/dashboard/usuarios.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_USUARIOS);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        (row.estado) ? icon ='assignment_late' : icon = 'assignment_turned_in';
        content += `
            <tr>
                <td>${row.nombre_usuario}</td>
                <td>${row.apellidos_usuario}</td>
                <td>${row.correo_usuario}</td>
                <td>${row.alias_usuario}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_usuario})" class="btn btn-floating waves-effect transparent z-depth-0 tooltipped" data-tooltip="Actualizar"><i class="material-icons black-text">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_usuario})" class="btn btn-floating waves-effect transparent z-depth-0 tooltipped" data-tooltip="Eliminar"><i class="material-icons black-text">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_USUARIOS, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Crear usuario';
    // Se habilitan los campos de alias y contraseña.
    document.getElementById('alias_usuario').disabled = false;
    document.getElementById('clave_usuario').disabled = false;
    document.getElementById('confirmar_clave').disabled = false;
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar usuario';
    // Se deshabilitan los campos de alias y contraseña.
    document.getElementById('alias_usuario').disabled = true;
    document.getElementById('clave_usuario').disabled = true;
    document.getElementById('confirmar_clave').disabled = true;

    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_usuario', id);

    fetch(API_USUARIOS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_usuario').value = response.dataset.id_usuario;
                    document.getElementById('nombre_usuario').value = response.dataset.nombre_usuario;
                    document.getElementById('apellidos_usuario').value = response.dataset.apellidos_usuario;
                    document.getElementById('correo_usuario').value = response.dataset.correo_usuario;
                    document.getElementById('alias_usuario').value = response.dataset.alias_usuario;
                    document.getElementById('correo_usuario').value = response.dataset.correo_usuario;
                    if (response.dataset.factor) {
                        document.getElementById('factor').setAttribute("checked", "checked");
                    }
                    document.getElementById('estado_usuario').value = response.dataset.estado_usuario;
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

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('id_usuario').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_USUARIOS, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_usuario', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_USUARIOS, data);
}