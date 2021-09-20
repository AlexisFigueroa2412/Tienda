// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../app/api/dashboard/usuarios.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se inicializa el componente Tooltip asignado al botón del formulario para que funcione la sugerencia textual.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));

    // Petición para verificar si existen usuarios.
    fetch(API_USUARIOS + 'readAll', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción
                if (response.status) {
                    sweetAlert(4, 'Debe autenticarse para ingresar', null);
                    let content = '';
                    content += `
                        <h5 class="Titulos">CALIFORNIA</h5>
                        <h5 class="Subtitulos">¡Bienvenido de vuelta!</h5>
                        <!--<a class="btn white black-text waves-effect waves-light hoverable" href="register.php">Registrate</a>-->
                    `;
                    // Se agrega el acceso al formulario de nuevo usuario.
                    document.getElementById('signUp-overlay').innerHTML = content;
                } else {
                    sweetAlert(3, response.exception, null);
                    let content = '';
                    content += `
                        <h5 class="Subtitulos">¿Eres nuevo por acá?</h5>
                        <a class="btn white black-text waves-effect waves-light hoverable" href="register.php">Registrate</a>
                    `;
                    // Se agrega el acceso al formulario de nuevo usuario.
                    document.getElementById('signUp-overlay').innerHTML = content;
                    let contentMobile = '';
                    contentMobile += `
                        <br><br>
                        <p class="center">¿Eres nuevo por acá?</p>
                        <a class="btn white black-text waves-effect waves-light hoverable modal-trigger"
                            data-target="modal2">Registrate</a>
                    `;
                    // Se agrega el acceso al formulario de nuevo usuario.
                    document.getElementById('signUp-overlayMobile').innerHTML = contentMobile;
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('session-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_USUARIOS + 'logIn', {
        method: 'post',
        body: new FormData(document.getElementById('session-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    //sweetAlert(1, response.message, 'dashboard.php');
                    fetch(API_USUARIOS + 'checkFactor', {
                        method: 'get'
                    }).then(function (request) {
                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                        if (request.ok) {
                            request.json().then(function (response) {
                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                                if (response.status) {
                                    sweetAlert(4, response.message, 'factor.php');
                                } else {
                                    //sweetAlert(2, response.exception, 'dashboard.php');
                                    fetch(API_USUARIOS + 'checkIntervalo', {
                                        method: 'get'
                                    }).then(function (request) {
                                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                                        if (request.ok) {
                                            request.json().then(function (response) {
                                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                                                if (response.status) {
                                                    sweetAlert(1, response.message, 'dashboard.php');
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