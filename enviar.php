<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = htmlspecialchars($_POST['nombres']);
    $distrito = htmlspecialchars($_POST['distrito']);
    $celular = htmlspecialchars($_POST['celular']);
    $actividad = htmlspecialchars($_POST['actividad']);

    $correo_usuario = "correo_predeterminado@dominio.com";  // Añadir un campo de correo en el formulario si es necesario
    $destinatario = "info@marakpital.com";  // Correo de la empresa
    $asunto = "Solicitud de Préstamo - Nuevo Registro";
    
    $mensaje = "
    <h3>Solicitud de Préstamo</h3>
    <p><strong>Nombres:</strong> $nombres</p>
    <p><strong>Distrito:</strong> $distrito</p>
    <p><strong>Nro Celular:</strong> $celular</p>
    <p><strong>Actividad:</strong> $actividad</p>
    ";

    // Cabeceras para envío en formato HTML
    $cabeceras = "MIME-Version: 1.0" . "\r\n";
    $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $cabeceras .= "From: formulario@tuempresa.com" . "\r\n";

    // Enviar a la empresa
    $enviado_empresa = mail($destinatario, $asunto, $mensaje, $cabeceras);

    // Enviar copia al usuario
    $asunto_usuario = "Confirmación de Solicitud de Préstamo";
    $mensaje_usuario = "
    <h3>Hola $nombres,</h3>
    <p>Gracias por completar el formulario de solicitud de préstamo. Estos son los datos que hemos recibido:</p>
    <p><strong>Nombres:</strong> $nombres</p>
    <p><strong>Distrito:</strong> $distrito</p>
    <p><strong>Nro Celular:</strong> $celular</p>
    <p><strong>Actividad:</strong> $actividad</p>
    <p>Nos pondremos en contacto contigo lo más pronto posible.</p>
    ";

    $enviado_usuario = mail($correo_usuario, $asunto_usuario, $mensaje_usuario, $cabeceras);

    if ($enviado_empresa && $enviado_usuario) {
        echo "<script>alert('Formulario enviado correctamente.'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Error al enviar el formulario.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acceso no permitido.'); window.location.href = 'index.html';</script>";
}
?>
