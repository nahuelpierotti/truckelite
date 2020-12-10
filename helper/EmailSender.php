<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


class EmailSender
{


    function enviar_email_recupero($to,$id_usuario)
    {
        $retu="ok";
        try {
            $url_cambio_clave="localhost/truckelite/claveNueva?u=$id_usuario";

            $cuerpo  = "<html>
            <body>
            <h3>Para recuperar su contrase&ntilde;a ingrese en el siguiente link:</h3>
            <br>
            <p style='color: #2196f3;line-height: 1.4;'>
                <a style='border-bottom: 1px solid; background: lightblue;' href=\"$url_cambio_clave\" target='_blank'>Cambiar Clave</a>
                </p>
            <br>
            </body>
            </html>";

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Host de conexión SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'truckelite20@gmail.com';                 // Usuario SMTP
            $mail->Password = 'Truckelite2020';                           // Password SMTP
            $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
            $mail->Port = 587;
            $mail->setFrom('truckelite20@gmail.com');
            $mail->isHTML(true);
            $mail->addAddress($to);
            $mail->Subject = 'Recupero TRUCKELITE';
            $mail->Body = $cuerpo;
            $mail->AltBody = $cuerpo;    // Contenido del mensaje alternativo (texto plano)
            $mail->addCustomHeader('MIME-Version: 1.0');
            $mail->addCustomHeader('Content-Type: text/html; charset=ISO-8859-1');
            $mail->send();

        }catch (Exception $e) {
            $retu= 'El mensaje no se ha podido enviar, error: '.$mail->ErrorInfo;
        }
        return $retu;
    }

    function enviar_email_registracion($to,$nombre)
    {
        $retu="ok";
        try {
            $cuerpo="<h3>Bienvenido a Truckelite <strong>'$nombre'</strong></h3><br>
            En breve se te confirmara el acceso a nuestro sistema.";


            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Host de conexión SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'truckelite20@gmail.com';                 // Usuario SMTP
            $mail->Password = 'Truckelite2020';                           // Password SMTP
            $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
            $mail->Port = 587;
            $mail->setFrom('truckelite20@gmail.com');
            $mail->isHTML(true);
            $mail->addAddress($to);
            $mail->Subject = 'Registro TRUCKELITE';
            $mail->Body = $cuerpo;
            $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
            $mail->send();

        }catch (Exception $e) {
            $retu= 'El mensaje no se ha podido enviar, error: '.$mail->ErrorInfo;
        }
        return $retu;
    }
}