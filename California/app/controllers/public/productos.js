// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PRODUCTOS = '../../app/api/dashboard/productos.php?action=';
const ENDPOINT_TIPO_PRODUCTOS= '../../app/api/dashboard/categorias.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    readProductos();
});


// Función para obtener y mostrar las categorías existentes en la base.
function readProductos() {
    fetch(API_PRODUCTOS + 'readAll', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    let content = '';
                    response.dataset.map(function (row) {
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
                        `;
                    });                    
                    document.getElementById('tbody-rows').innerHTML = content;
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                } else {
                    sweetAlert(2, 'Error al cargar productos', null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}


