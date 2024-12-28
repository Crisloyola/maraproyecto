<?php
if (isset($_POST['submit'])) {
    // Recoger los datos del formulario
    $monto = $_POST['monto'];
    $nombres = $_POST['nombres'];
    $distrito = $_POST['distrito'];
    $celular = $_POST['celular'];
    $actividad = $_POST['actividad'];

    // Dirección de correo de destino (tu correo corporativo)// Cambia esto por tu correo real
    $destinatario = "loyoladv@gmail.com";
    $asunto = "Prestamo el cliente $nombres";

    $contenido = "Nombre: " . $nombres . "\n";
    $contenido .= "Distrito: " . $distrito . "\n";
    $contenido .= "Celular: " . $celular . "\n";    
    $contenido .= "Actividad: " . $actividad . "\n";    
    $contenido .= "Monto: " . $monto . "\n";

    $header = "From: prestamo@marakpital.com";

    $mail = mail($destinatario, $asunto, $contenido, $header);   
    if ($mail) {
        echo "<script>alert('Gracias por su solicitud, nos pondremos en contacto con usted lo más pronto posible.')</script>";
    } else {
        echo "<script>alert('No se envio el mensaje.')</script>";
    }
}
?>