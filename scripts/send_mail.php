<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Validar que todos los campos estén completos
    if (!empty($name) && !empty($surname) && !empty($email) && !empty($message)) {
        // Dirección de correo de destino
        $to = "ornemeolansph@gmail.com";

        // Asunto del correo
        $subject = "Nuevo mensaje de contacto";

        // Contenido del correo
        $body = "Nombre: $name\nApellido: $surname\nEmail: $email\n\nMensaje:\n$message";

        // Encabezados del correo
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Intentar enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "¡Mensaje enviado correctamente!";
        } else {
            echo "Hubo un error al enviar el mensaje. Por favor, intenta nuevamente.";
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
