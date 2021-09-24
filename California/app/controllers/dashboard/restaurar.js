// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../app/api/dashboard/usuarios.php?action=';

// Atributo para almacenar la acción a realizar
var accion = 0;

// Método para enviar el correo electronico al presionar boton.
function enviarCorreo(){
    let content = '';
    content += `
            <div id="2" class="preloader-wrapper small active">
                <div class="spinner-layer spinner-green-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        `;
    document.getElementById('spn').innerHTML = content;
    // Realizamos una peticion a la API indicando el caso a utilizar y enviando la direccion de la API como parametro
    if (accion == 0) {
        // Validamos si el campo de correo esta vacio
        if (document.getElementById("correo").value == '') {
            // Enviamos el mensaje de validacion indicando que el correo esta vacio, y debe de escribir alguno.
            sweetAlert(4, 'Ingrese el correo electrónico', null);
        } else {
            // Realizamos peticion a la API enviando el nombre del caso el tipo de metodo y el formulario
            fetch(API_USUARIOS + 'sendEmail', {
                method: 'post',
                body: new FormData(document.getElementById('email-form'))
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            let content = '';
                            content += `
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="50" height="50"
                            viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M170.64281,0.7525c-1.06156,-0.83312 -2.51281,-0.95406 -3.70875,-0.30906l-165.12,89.44c-1.19594,0.645 -1.89469,1.94844 -1.76031,3.30563c0.12094,1.35719 1.03469,2.51281 2.32469,2.92937l46.93719,15.31875l-4.54188,46.46688c-0.14781,1.47812 0.67188,2.87562 2.02906,3.45344c0.43,0.20156 0.90031,0.29563 1.35719,0.29563c0.95406,0 1.89469,-0.40313 2.55313,-1.15563l29.60281,-33.44594l44.57219,43.94062c0.645,0.63156 1.505,0.98094 2.39187,0.98094c0.30906,0 0.61813,-0.05375 0.92719,-0.13438c1.16906,-0.3225 2.08281,-1.26312 2.37844,-2.44562l41.28,-165.12c0.3225,-1.31688 -0.14781,-2.70094 -1.22281,-3.52063zM56.2225,110.80563l67.12031,-54.27406l-45.74125,63.33094l-25.03406,28.25906z"></path></g></g></svg>
                            `;
                            document.getElementById('spn').innerHTML = content;
                            // Mostramos mensaje de exito
                            sweetAlert(1, response.message, null);
                            // Habilitamos el campo para ingresar el codigo
                            document.getElementById('codigo').disabled = false;
                            // Deshabilitamos el campo para ingresar el correo
                            document.getElementById('correo').disabled = true;
                            // Colocamos uno a la accion para identificar que accion se debe realizar
                            accion = 1;
                        } else {
                            let content = '';
                            content += `
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="50" height="50"
                            viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none" stroke="none"></path><g id="original-icon" fill="#000000" stroke="none" opacity="0" visibility="hidden"><path d="M170.64281,0.7525c-1.06156,-0.83312 -2.51281,-0.95406 -3.70875,-0.30906l-165.12,89.44c-1.19594,0.645 -1.89469,1.94844 -1.76031,3.30563c0.12094,1.35719 1.03469,2.51281 2.32469,2.92937l46.93719,15.31875l-4.54188,46.46688c-0.14781,1.47812 0.67188,2.87562 2.02906,3.45344c0.43,0.20156 0.90031,0.29563 1.35719,0.29563c0.95406,0 1.89469,-0.40313 2.55313,-1.15563l29.60281,-33.44594l44.57219,43.94062c0.645,0.63156 1.505,0.98094 2.39187,0.98094c0.30906,0 0.61813,-0.05375 0.92719,-0.13438c1.16906,-0.3225 2.08281,-1.26312 2.37844,-2.44562l41.28,-165.12c0.3225,-1.31688 -0.14781,-2.70094 -1.22281,-3.52063zM56.2225,110.80563l67.12031,-54.27406l-45.74125,63.33094l-25.03406,28.25906z"></path></g><g id="subtracted-icon" fill="#000000" stroke="none"><path d="M171.86563,4.27313l-25.30442,101.2177c-2.6736,-4.0778 -6.51047,-6.54102 -11.0863,-6.54102c-5.97683,0 -10.29344,4.64865 -12.28571,8.6332l-22.178,39.87056l-20.69525,-20.40201l-29.60281,33.44594c-0.65844,0.7525 -1.59906,1.15563 -2.55313,1.15563c-0.45687,0 -0.92719,-0.09406 -1.35719,-0.29563c-1.35719,-0.57781 -2.17688,-1.97531 -2.02906,-3.45344l4.54188,-46.46688l-46.93719,-15.31875c-1.29,-0.41656 -2.20375,-1.57219 -2.32469,-2.92937c-0.13437,-1.35719 0.56438,-2.66063 1.76031,-3.30563l165.12,-89.44c1.19594,-0.645 2.64719,-0.52406 3.70875,0.30906c1.075,0.81969 1.54531,2.20375 1.22281,3.52063zM52.5675,148.12156l25.03406,-28.25906l45.74125,-63.33094l-67.12031,54.27406z"></path></g><g fill="#000000" stroke="none"><g id="Layer_9"><path d="M171.66795,164.03089l-29.88417,-53.12741c-0.33205,-1.32819 -2.65637,-5.31274 -6.30888,-5.31274c-3.65251,0 -5.64479,3.98456 -6.30888,4.98069l-29.55212,53.45946c-0.33205,0.33205 -0.33205,0.99614 -0.33205,1.66023c0,3.32046 2.98842,6.30888 6.30888,6.30888h60.10039c3.65251,0 6.30888,-2.65637 6.30888,-6.30888c0,-0.66409 0,-0.99614 -0.33205,-1.66023zM139.12741,161.37452c0,0.33205 -0.33205,0.66409 -0.66409,0.66409h-5.31274c-0.33205,0 -0.66409,-0.33205 -0.66409,-0.66409v-5.31274c0,-0.33205 0.33205,-0.66409 0.66409,-0.66409h5.31274c0.33205,0 0.66409,0.33205 0.66409,0.66409zM139.12741,148.09266c0,0.33205 -0.33205,0.66409 -0.66409,0.66409h-5.31274c-0.33205,0 -0.66409,-0.33205 -0.66409,-0.66409v-18.59459c0,-0.33205 0.33205,-0.66409 0.66409,-0.66409h5.31274c0.33205,0 0.66409,0.33205 0.66409,0.66409z"></path></g><g opacity="0"><g id="IOS" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="IOS_copy"><path d="M135.4749,98.94981c-5.97683,0 -10.29344,4.64865 -12.28571,8.6332l-29.55212,53.12741c-0.66409,1.66023 -0.99614,3.32046 -0.99614,4.98069c0,7.30502 5.97683,12.94981 12.94981,12.94981h60.10039c7.30502,0 12.94981,-5.64479 12.94981,-12.94981c0,-1.66023 -0.33205,-3.32046 -1.32819,-4.98069l-29.55212,-53.12741c-2.65637,-5.31274 -6.97297,-8.6332 -12.28571,-8.6332z"></path></g></g></g><path d="M99.28185,172v-66.40927h72.71815v66.40927z" id="overlay-drag" fill="#ff0000" stroke="none" opacity="0"></path></g></svg>
                            `;
                            document.getElementById('spn').innerHTML = content;
                            sweetAlert(4, response.exception, null);      
                        }
                    });
                } else {
                    console.log(request.status + ' ' + request.statusText);
                }
            }).catch(function (error) {
                console.log(error);
            }); 
        } 
    } else {
        // Validamos si el campo de correo esta vacio
        if (document.getElementById("codigo").value == '') {
            // Enviamos el mensaje de validación
            sweetAlert(4, 'Ingrese el código de verificación', null);
        } else {
            // Realizamos peticion a la API enviando el nombre del caso el tipo de metodo y el formulario
            fetch(API_USUARIOS + 'verifyCode', {
                method: 'post',
                body: new FormData(document.getElementById('email-form'))
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Mostramos mensaje de exito
                            sweetAlert(1, response.message,'clave.php');
                        } else {
                            // Validamos el numero de intentos al verificar el codigo
                            if (accion == 4) {
                                // Si el usuario se equivoca mas de 3 veces en el codigo redirigira al index
                                sweetAlert(4, 'Has fallado 3 veces el código, serás redirigido al login', 'index.php');          
                            } else {
                                sweetAlert(4, response.exception, null);
                                // Reutilizamos el atributo para llevar la cuenta de los intentos
                                accion++;
                            }
                        }
                    });
                } else {
                    console.log(request.status + ' ' + request.statusText);
                }
            }).catch(function (error) {
                console.log(error);
            }); 
        } 
    }
}