// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTES = '../../app/api/public/clientes.php?action=';

// Método manejador de eventos que se ejecuta cuando se envía el formulario de cambiar cantidad de producto.
document.getElementById('session-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_CLIENTES + 'logIn', {
        method: 'post',
        body: new FormData(document.getElementById('session-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    //sweetAlert(1, response.message, 'dashboard.php');
                    fetch(API_CLIENTES + 'checkFactor', {
                        method: 'get'
                    }).then(function (request) {
                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                        if (request.ok) {
                            request.json().then(function (response) {
                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                                if (response.status) {
                                    sweetAlert(4, response.message, 'factor.php');
                                } else {
                                    //sweetAlert(2, 'paso', null);
                                    fetch(API_CLIENTES + 'checkIntervalo', {
                                        method: 'get'
                                    }).then(function (request) {
                                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                                        if (request.ok) {
                                            request.json().then(function (response) {
                                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                                                if (response.status) {
                                                    sweetAlert(1, response.message, 'index.php');
                                                } else {
                                                    sweetAlert(1, response.exception, 'cambiar_clave.php');
                                                }
                                            });
                                        } else {
                                            console.log(request.status + ' ' + request.statusText);
                                        }
                                    }).catch(function (error) {
                                        console.log(error);
                                    });
                                }
                            });
                        } else {
                            console.log(request.status + ' ' + request.statusText);
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
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