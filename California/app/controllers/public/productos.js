// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PRODUCTOS = '../../app/api/dashboard/productos.php?action=';
const ENDPOINT_TIPO_PRODUCTOS= '../../app/api/dashboard/categorias.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PRODUCTOS);
    //fillSelect(ENDPOINT_TIPO_PRODUCTOS, 'cmbtipo_producto', null);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    //Se crea la variable del contenido
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se establece un icono para el estado del producto.
        (row.estado_producto) ? icon = 'visibility' : icon = 'visibility_off';
        // Se crean y concatenan las cards con los datos de cada registro.
        content += `  
        
        <div class="col s12 m6 l4">
            <div class="card hoverable appear-down">
                <!--Imagen del producto-->
                <div class="card-image">
                <img src="../../resources/img/productos/${row.foto}">
                <a href="producto.php?id=${row.id_producto}" class="btn-floating halfway-fab waves-effect waves-light black hoverable"><i class="material-icons">call_made</i></a>
                </div>
                <div class="card-content">
                <!--Precio del producto-->
                <span class="card-title Titulos">$${row.precio_producto}</span>
                <!--Nombre del producto-->
                <p class="Texto">${row.nombre_producto}</p>
                <!--Descripcion del producto-->
                <p class="Texto">${row.descripcion_producto}</p><br>
                
                </div>    
                <!--Descuento del producto-->
                <div class="card-action">
                <span class="left new badge" data-badge-caption=${row.cantidad_total}>Cantidad:</span>
                </div>             
            </div>
        </div>

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
                        <span class="card-title black-text">${row.nombre_producto}</span>
                        <p>$${row.precio_producto}</p>
                        <p>Disponibles: ${row.cantidad_total}</p>
                        <div class="row">
                            <br>
                        </div>
                        <div class="row">
                            <div class="col s4 m4 l4">
                                <a href="#" onclick="openUpdateDialog(${row.id_producto})" class="btn btn-floating waves-effect black tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>                            </div>
                            <div class="col s4 m4 l4">
                                <a href="#" onclick="openDeleteDialog(${row.id_producto})" class="btn btn-floating waves-effect black tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
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
    document.getElementById('tbody-rows').innerHTML = content;
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}