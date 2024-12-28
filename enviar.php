<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $monto = $_POST['monto'];
    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $distrito = $_POST['distrito'];
    $celular = $_POST['celular'];
    $actividad = $_POST['actividad'];

    $destinatario = "info@marakpital.com";
    $asunto = "Prestamo el cliente $nombres";
    $contenido = "DNI: " . $dni . "\n"; 
    $contenido .= "Nombre: " . $nombres . "\n";
    $contenido .= "Distrito: " . $distrito . "\n";
    $contenido .= "Celular: " . $celular . "\n";    
    $contenido .= "Actividad: " . $actividad . "\n";    
    $contenido .= "Monto: " . $monto . "\n";

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/plain; charset=UTF-8' . "\r\n";
    $headers .= 'From: ' . "\r\n";
    $headers .= 'Reply-To: ' . "\r\n";

    $mail = mail($destinatario, $asunto, $contenido, $headers);   
    if ($mail) {
        echo "<script>alert('Gracias por su solicitud, nos pondremos en contacto con usted lo más pronto posible.')</script>";
    } else {
        echo "<script>alert('No se envió el mensaje.')</script>";
    }
}
?>
