<?php


$Nombre = $_POST['Name'];
$Email = $_POST['Email'];
//$Telefono = $_POST['Telefono'];
$M = htmlspecialchars($_POST['Message']);



 

$to = "sycsoftcontacto@gmail.com";
$subject = "Geocommsa Contacto";


$message = "<h3>De: $Nombre <h3>";
$message .= "Correo: $Email <br>";
$message .= "Mensaje: $M <br>";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';




$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sycsoftcontacto@gmail.com';                 // SMTP username
    $mail->Password = 'Pincho46.';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($to, 'Geocommsa Team');
    $mail->addAddress('jose.jrmg27@gmail.com', 'Jose'); 
    // $mail->addAddress('lindaruedaflores@gmail.com', 'Sycsoft Team'); 
    // $mail->addAddress('alexmillanes30@gmail.com', 'Sycsoft Team');
        // Add a recipient
 

    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    //$mail->AddAttachment($Img['tmp_name'], $Img['name']);
    $mail->send();
    echo "
                <script language='JavaScript'>
                var mensaje = 'Cotización Enviada, Espere Respuesta del Equipo de Sycsoft A Su Correo';
                alert(mensaje);
                </script>";
        echo "
                <script>
                 document.location.href = 'contacto.php';
                </script> "; 

} catch (Exception $e) {
    echo 'Hubo Un Error Al Enviar Su Cotizacion: ', $mail->ErrorInfo;
}






?>