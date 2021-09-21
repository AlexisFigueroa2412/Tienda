<?php
//These must be at the top of your script, not inside a function
require('../../libraries/PHPMailer/src/PHPMailer.php');
require('../../libraries/PHPMailer/src/Exception.php');
require('../../libraries/PHPMailer/src/SMTP.php');
require('../helpers/database.php');
require('../helpers/validator.php');
require('../models/usuarios.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
// Se instancia el módelo Usuarios para procesar los datos.
$usuario = new Usuarios;

$result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'californiaskateboardingsv@gmail.com';                     //SMTP username
    $mail->Password   = 'C@l1f0rn74';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('californiaskateboardingsv@gmail.com', 'California DevBears');
    // Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
    if(isset($_POST['id'])){
        // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
        if ($usuario->readCode($_POST['id'])) {
            if ($rowusuario = $usuario->readEmail($_POST['id'])) {
                $mail->addAddress($rowusuario['correo_usuario'], $rowusuario['alias_usuario']);     //Add a recipient
                //Content
                   $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = utf8_decode('Código de autentificación');
                $mail->Body    = 'Acá te envíamos tu código para que puedas verificar tu identidad <br><b>'.$rowusuario['codigo'].'</b><br> No lo compartas con nadie';
            } else {
                $result['exception'] = 'Message has not been sent';
            }
        } else {
            $result['exception'] = 'Message has not been start';
        }
    }else {
        $result['exception'] = 'Id vacío';
    }
    $mail->send();
    $result['status'] = 1;
    $result['message'] = 'Revisa tu correo';
} catch (Exception $e) {
    $result['exception'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
header('content-type: application/json; charset=utf-8');
// Se imprime el resultado en formato JSON y se retorna al controlador.
print(json_encode($result));
?>