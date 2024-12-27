<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $nombres = htmlspecialchars($_POST['nombres']);
    $distrito = htmlspecialchars($_POST['distrito']);
    $celular = htmlspecialchars($_POST['celular']);
    $actividad = htmlspecialchars($_POST['actividad']);
    $monto = htmlspecialchars($_POST['monto']);

    // Configuración del correo
    $to = "tucorreo@dominio.com"; // Reemplaza con tu correo
    $subject = "Nueva solicitud de precalificación";
    $message = "
        <h1>Detalles del formulario</h1>
        <p><strong>Nombres:</strong> $nombres</p>
        <p><strong>Distrito:</strong> $distrito</p>
        <p><strong>Celular:</strong> $celular</p>
        <p><strong>Actividad:</strong> $actividad</p>
        <p><strong>Monto:</strong> $monto</p>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@tudominio.com" . "\r\n"; // Reemplaza con un remitente válido

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        // Redirigir o mostrar mensaje de éxito
        echo "<script>
            alert('El correo se envió correctamente.');
            window.location.href = 'gracias.html';
        </script>";
    } else {
        // Mostrar mensaje de error
        echo "<script>
            alert('Hubo un error al enviar el correo. Inténtalo de nuevo.');
            window.history.back();
        </script>";
    }
}
?>
