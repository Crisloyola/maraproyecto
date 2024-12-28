<?php
// Incluir archivos necesarios de PHPMailer
require 'vendors/PHPMailer/src/Exception.php';
require 'vendors/PHPMailer/src/PHPMailer.php';
require 'vendors/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $monto = $_POST['monto'];
    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $distrito = $_POST['distrito'];
    $celular = $_POST['celular'];
    $actividad = $_POST['actividad'];
    $pago = $_POST['formaPago'];

    $destinatario = "info@marakpital.com"; // Destinatario del correo
    $asunto = "Prestamo del cliente $nombres";

    // Contenido del correo
    $contenido  = "Monto: " .$monto . "\n";
    $contenido .= "DNI: " . $dni . "\n"; 
    $contenido .= "Nombre: " . $nombres . "\n";
    $contenido .= "Distrito: " . $distrito . "\n";
    $contenido .= "Celular: " . $celular . "\n";    
    $contenido .= "Actividad: " . $actividad . "\n";    
    $contenido .= "Forma de Pago: " . $pago . "\n";

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'mail.marakpital.com'; // Cambia esto según tu servidor SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@marakpital.com'; // Tu correo electrónico
        $mail->Password   = '8tK2yWsq89';       // Contraseña o clave de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Configuración del correo
        $mail->setFrom('asunto@marakpital.com', 'Asunto'); // Cambia tu correo y nombre
        $mail->addAddress($destinatario); // Dirección del destinatario
        $mail->Subject = $asunto; // Asunto del correo
        $mail->Body    = $contenido; // Contenido en texto plano
        $mail->isHTML(false); // Configura si el correo es texto plano o HTML

        // Enviar correo
        $mail->send();
        header("Location: formularioEnviado.html");
        exit();
    } catch (Exception $e) {
        echo "<script>alert('No se pudo enviar el mensaje. Error: {$mail->ErrorInfo}')</script>";
    }
}
?>
