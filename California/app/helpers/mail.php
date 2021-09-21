<?php
    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'californiaskateboardingsv@gmail.com';                     //SMTP username
        $mail->Password   = 'C@l1f0rn74';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('californiaskateboardingsv@gmail.com', 'California DevBears');
        // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
        if ($usuario->readCode($_SESSION['factorpv'])) {
            if ($rowusuario = $usuario->readEmail($_SESSION['factorpv'])) {
                $mail->addAddress($rowusuario['correo_usuario'], $rowusuario['alias_usuario']);     //Add a recipient
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Código de autentificación';
                $mail->Body    = 'Acá te envíamos tu código para que puedas verificar tu identidad <br><b>'.$rowusuario['codigo'].'</b><br> No lo compartas con nadie';
            } else {
                echo 'Message has not been sent 2';
            }
        } else {
            echo 'Message has not been sent';
        }
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }