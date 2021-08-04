<?php

$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$telefono=$_POST["telefono"];
$mensaje=$_POST["mensaje"];

$body = "Nombre:" . $nombre . "<br>Correo:" . $correo. "<br>Telefono:" . $telefono . "<br>Mensaje:". $mensaje;

    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                         //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ed.pruevas@gmail.com';                     //SMTP username
    $mail->Password   = '41065029';                               //SMTP password
    $mail->SMTPSecure = 'tls';          //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port    = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ed.pruevas@gmail.com', $nombre );
    $mail->addAddress('ed.pruevas@gmail.com');     //Add a 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Hola estoy enviando el correo desde local host';
    $mail->Body    = $body;
    $mail->Charset = 'UTF-8';
    
    $mail->SMTPOptions = array(
                     'ssl' => array(
                     'verify_peer' => false,
                     'verify_peer_name' => false,
                     'allow_self_signed' => true
                     )

                      );
   
    $mail->send();
    echo '<script>
        alert("El mensaje se envio correctamente");
        window.history.go(-1);
        </script> ';
    
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje:, {$mail->ErrorInfo}";
}