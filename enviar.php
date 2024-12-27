<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar datos del formulario
    $nombres = htmlspecialchars($_POST['nombres']);
    $distrito = htmlspecialchars($_POST['distrito']);
    $celular = htmlspecialchars($_POST['celular']);
    $actividad = htmlspecialchars($_POST['actividad']);
    $monto = htmlspecialchars($_POST['monto']); // Si tiene valor.

    // Configurar detalles del correo
    $to = 'info@marakpital.com'; // Cambiar por tu correo de destino
    $subject = 'Nueva Precalificación - Datos del Usuario';
    $message = "
        <html>
        <head>
            <title>Datos de Precalificación</title>
        </head>
        <body>
            <h3>Datos de la Precalificación</h3>
            <p><strong>Nombres:</strong> $nombres</p>
            <p><strong>Distrito:</strong> $distrito</p>
            <p><strong>Celular:</strong> $celular</p>
            <p><strong>Actividad:</strong> $actividad</p>
            <p><strong>Monto:</strong> $monto</p>
        </body>
        </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@tu-dominio.com" . "\r\n"; // Cambiar según sea necesario.

    // Enviar correo
    if (mail($to, $subject, $message, $headers)) {
        echo "Correo enviado exitosamente.";
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Método no permitido.";
}
?>
