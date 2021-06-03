// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PRODUCTOS = '../../app/api/dashboard/productos.php?action=';
const ENDPOINT_TIPO_PRODUCTOS= '../../app/api/dashboard/categorias.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PRODUCTOS);
    fillSelect(ENDPOINT_TIPO_PRODUCTOS, 'cmbtipo_producto', null);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    //Se crea la variable del contenido
    let content = '';
    //Se crea la variable que contiene el modal para crear productos
    let adder = '';
    adder +=    `
    <div class="col l4 s12 m6">
                <div class="card small z-depth-0 hoverable">
                    <div class="card-image center"><br><br><br>
                        <a href="#!" onclick="openCreateDialog()" class="center"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                y="0px" width="50" height="50" viewBox="0 0 172 172" style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                    stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                    text-anchor="none" style="mix-blend-mode: normal">
                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                    <g fill="#000000">
                                        <path
                                            d="M68.8,13.76c-0.91228,0.00018 -1.78715,0.36269 -2.43219,1.00781l-5.87219,5.87219h-28.20531c-6.3882,0 -11.97418,4.43656 -13.41063,10.66266l-7.85422,34.05734h-4.14547c-3.76014,0 -6.88,3.11986 -6.88,6.88v13.76c0,3.76014 3.11986,6.88 6.88,6.88h1.64609l18.39594,63.79453c0.8428,2.90336 3.98637,5.00547 7.47797,5.00547h69.72047c-1.548,-2.15 -2.89653,-4.44792 -4.0111,-6.88h-65.70937c-0.49536,0 -0.92176,-0.24671 -0.86672,-0.04031l-17.83828,-61.87969h140.61l-2.00219,6.9875c2.16032,0.95976 4.22749,2.07921 6.17453,3.37953l2.98984,-10.36703h1.65281c3.76014,0 6.88,-3.11986 6.88,-6.88v-13.76c0,-3.76014 -3.11986,-6.88 -6.88,-6.88h-4.14547l-7.86094,-34.05734c-1.43608,-6.22454 -7.01571,-10.66266 -13.40391,-10.66266h-28.20531l-5.87219,-5.87219c-0.64504,-0.64512 -1.5199,-1.00764 -2.43219,-1.00781zM70.22437,20.64h31.55125l5.87219,5.87219c0.64504,0.64512 1.5199,1.00764 2.43219,1.00781h29.62969c3.22317,0 5.98107,2.19555 6.70531,5.33469l7.49813,32.50531h-135.82625l7.49813,-32.50531c0.72388,-3.13758 3.48215,-5.33469 6.70531,-5.33469h29.62969c0.91228,-0.00018 1.78715,-0.36269 2.43219,-1.00781zM6.88,72.24h158.24v13.76h-158.24zM58.48,103.2c-1.89888,0 -3.44,1.54456 -3.44,3.44v34.13797c0,1.89544 1.54112,3.44 3.44,3.44c1.89888,0 3.44,-1.54456 3.44,-3.44v-34.13797c0,-1.89544 -1.54112,-3.44 -3.44,-3.44zM85.99328,103.2c-1.89888,0 -3.44,1.54456 -3.44,3.44l0.00672,34.13797c0,1.89544 1.54112,3.44 3.44,3.44c1.89888,0 3.44,-1.54456 3.44,-3.44l-0.00672,-34.13797c0,-1.89544 -1.54112,-3.44 -3.44,-3.44zM137.6,103.2c-18.92,0 -34.4,15.48 -34.4,34.4c0,18.92 15.48,34.4 34.4,34.4c18.92,0 34.4,-15.48 34.4,-34.4c0,-18.92 -15.48,-34.4 -34.4,-34.4zM137.6,110.08c15.136,0 27.52,12.384 27.52,27.52c0,15.136 -12.384,27.52 -27.52,27.52c-15.136,0 -27.52,-12.384 -27.52,-27.52c0,-15.136 12.384,-27.52 27.52,-27.52zM137.6,117.30265c-2.064,0 -3.44,1.376 -3.44,3.44v13.41735h-13.41735c-2.064,0 -3.44,1.376 -3.44,3.44c0,2.064 1.376,3.44 3.44,3.44h13.41735v13.41735c0,2.064 1.376,3.44 3.44,3.44c2.064,0 3.44,-1.376 3.44,-3.44v-13.41735h13.41735c2.064,0 3.44,-1.376 3.44,-3.44c0,-2.064 -1.376,-3.44 -3.44,-3.44h-13.41735v-13.41735c0,-2.064 -1.376,-3.44 -3.44,-3.44z">
                                        </path>
                                    </g>
                                </g>
                            </svg></a>
                    </div>
                    <div class="card-content black-text">
                        <span class="card-title Texto center">Agregar nuevo producto</span>
                    </div>
                </div>
                <br>
                <br>
            </div>
    `;
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se establece un icono para el estado del producto.
        (row.estado_producto) ? icon = 'visibility' : icon = 'visibility_off';
        // Se crean y concatenan las cards con los datos de cada registro.
        content += `   
            <div class="col l4 s12 m6">
                <div class="card small z-depth-0">
                    <div class="card-image">
                        <img src="../../resources/img/productos/${row.foto}">
                    </div>
                    <a href='#' data-target='dropdownmas'
                        class="dropdown-trigger btn-floating right btn-large waves-effect waves-dark transparent z-depth-0">
                        <i class="large material-icons black-text hoverable">more_vert</i>
                    </a>
                    <div class="card-content black-text">
                        <span class="card-title black-text">${row.nombre}</span>
                        <p>$${row.precio}</p>
                        <p>Disponibles: ${row.cantidad_total}</p>
                        <div class="row">
                            <br>
                        </div>
                        <div class="row">
                            <div class="col s4 m4 l4">
                                <a href="#" onclick="openUpdateDialog(${row.idProductos})" class="btn btn-floating waves-effect black tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>                            </div>
                            <div class="col s4 m4 l4">
                                <a href="#" onclick="openDeleteDialog(${row.idProductos})" class="btn btn-floating waves-effect black tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = adder + content;
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_PRODUCTOS, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Crear producto';
    // Se establece el campo de archivo como obligatorio.
    document.getElementById('foto').required = true;
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
   fillSelect(ENDPOINT_TIPO_PRODUCTOS, 'tipo_producto', null);
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar producto';
    // Se establece el campo de archivo como opcional.
    document.getElementById('archivo_producto').required = false;

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
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_producto').value = response.dataset.id_producto;
                    document.getElementById('nombre_producto').value = response.dataset.nombre_producto;
                    document.getElementById('precio_producto').value = response.dataset.precio_producto;
                    document.getElementById('descripcion_producto').value = response.dataset.descripcion_producto;
                    fillSelect(ENDPOINT_TIPO_PRODUCTOS, 'tipo_producto', response.dataset.id_categoria);
                    if (response.dataset.estado_producto) {
                        document.getElementById('estado_producto').checked = true;
                    } else {
                        document.getElementById('estado_producto').checked = false;
                    }
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
    if (document.getElementById('id_producto').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_PRODUCTOS, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PRODUCTOS, data);
}