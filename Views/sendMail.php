<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require_once 'header.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$email=$_SESSION['userLogged']->getEmail();
$name=$_SESSION['userLogged']->getFirstName().' '.$_SESSION['userLogged']->getLastName();
date_default_timezone_set("America/Argentina/Buenos_Aires");
$hoy = date("F j, Y, g:i a");    



try {
    //TODO ACCEDER AL USUARIO DONDE SE ENVIARA EL MENSAJE
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //TODO CAMBIADO A GMAIL
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'utnmailer@gmail.com';                     //SMTP username
    $mail->Password   = 'laboratorio4';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //TODO USUARIO QUE RECIBIRA EL CORREO
    $mail->setFrom('utnmailer@gmail.com', 'UTN Mailer');  //TODO DESDE
    $mail->addAddress($email,$name); //TODO HACIA
    

    //TODO PARA ENVIAR ARCHIVOS
    // $mail->addAttachment('/var/tmp/file.tar.gz');         
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML

    $mail->Subject = 'Culminacion de postulacion';
    $mail->Body    = utf8_decode('Hola ' .  $name . ', te enviamos este mail para notificarte que la postulacion en la que estabas
                          inscripto acaba de caducar en el d??a de hoy. Muchas gracias por tu confianza en nuestro sistema!<br> Fecha de notificacion: '. $hoy); 
    

    $mail->send();
    
} catch (Exception $e) {
    echo "Nose que mierda hiciste pero le erraste: {$mail->ErrorInfo}";
}