/*
*   Este controlador es de uso general en las páginas web del sitio público. Se importa en la plantilla del pie del documento.
*   Sirve para manejar todo lo que tiene que ver con la cuenta del cliente.
*/

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../app/api/public/clientes.php?action=';

//Se activa el contador para Cerrar Sesión en caso de inactividad
document.addEventListener('DOMContentLoaded', function () {
    //Se manda a llamar al contador de tiempo
    contadorInactividad();
});

//Función que Cierra Sesión en función del tiempo de sesión
function inactividad() {
    //Se pide verificar primero si existe una sesión previa
    fetch(API + 'viewSession', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Si existe una sesión previa, se pocede a cerrar la misma
                // Si no existe una sesión previa, se reinicia el contador
                if (response.status) {
                    // Se pide cerrar la sesión
                    fetch(API + 'logOut', {
                        method: 'get'
                    }).then(function (request) {
                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                        if (request.ok) {
                            request.json().then(function (response) {
                                // Se comprueba si la sesión se ha cerrado correctamente, de lo contrario se muestra un mensaje con la excepción.
                                if (response.status) {
                                    sweetAlert(4, 'Se ha cerrado sesión por inactividad', 'index.php');
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
                } else {
                    if (t) clearTimeout(t);
                    contadorInactividad();
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Variable que maneja el parámetro de cierre del contador
var t = null;

// Función que ejecuta el contador 
function contadorInactividad() {
    //Se inicializa el contador a 5 minutos para ejecutar la función "inactividad" que obliga al cierre de sesión
    t = setTimeout("inactividad()", 300000);
}

// Se verifica si existe actividad en el sitio
window.onblur = window.onmousemove = function () {
    // Al haber actividad se pide verificar si existe un sesión activa
    fetch(API + 'viewSession', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si existe una sesión activa, de lo contrario se muestra un mensaje con la excepción.
                // Si no existe una sesión previa, se reinicia el contador
                if (response.status) {
                    // Se pide que se actualice el estado del tiempo de la sesión
                    fetch(API + 'controlTime', {
                        method: 'get'
                    }).then(function (request) {
                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                        if (request.ok) {
                            request.json().then(function (response) {
                                // Se comprueba si el estado del tiempo se actualizo, de lo contrario se muestra un mensaje con la excepción.
                                if (response.status) {
                                    //Se reinicia el contador
                                    if (t) clearTimeout(t);
                                    contadorInactividad();
                                    /*fetch(API + 'tiempoActual', {
                                        method: 'get'
                                    }).then(function (request) {
                                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                                        if (request.ok) {
                                            request.json().then(function (response) {
                                                // Se comprueba si la sesión se ha cerrado correctamente, de lo contrario se muestra un mensaje con la excepción.
                                                if (response.status) {
                                                    sweetAlert(4, response.message, 'index.php');
                                                } else {
                                                    sweetAlert(2, response.exception, null);
                                                }
                                            });
                                        } else {
                                            console.log(request.status + ' ' + request.statusText);
                                        }
                                    }).catch(function (error) {
                                        console.log(error);
                                    });*/
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

                } else {
                    if (t) clearTimeout(t);
                    contadorInactividad();
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}
// Método manejador de eventos que se ejecuta cuando se envía el formulario de cambiar clave.
document.getElementById('password-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API + 'changePassword', {
        method: 'post',
        body: new FormData(document.getElementById('password-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se cierra la caja de dialogo (modal) del formulario.
                    let instance = M.Modal.getInstance(document.getElementById('password-modal'));
                    instance.close();
                    sweetAlert(1, response.message, null);
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
});


// Función para mostrar un mensaje de confirmación al momento de cerrar sesión.
function logOut() {
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de cerrar la sesión?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de cerrar sesión, de lo contrario se muestra un mensaje.
        if (value) {
            fetch(API + 'logOut', {
                method: 'get'
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            sweetAlert(1, response.message, 'index.php');
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
        } else {
            sweetAlert(4, 'Puede continuar con la sesión', null);
        }
    });

}
// Función para mostrar el formulario de cambiar contraseña del usuario que ha iniciado sesión.
function openPasswordDialog() {
    // Se restauran los elementos del formulario.
    
    // Se abre la caja de dialogo (modal) que contiene el formulario para cambiar contraseña, ubicado en el archivo de las plantillas.
    let instance = M.Modal.getInstance(document.getElementById('password-modal'));
    instance.open();
}