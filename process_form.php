<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Configurar el correo
    $to = "gabriel.adrian.felipe@gmail.com , strevezzaanaclara@gmail.com"; // Cambia esto a tu dirección de correo
    $subject = "Nuevo mensaje de contacto de estudio-malu";
    $headers = "From: hola@estudio-malu.com\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Construir el cuerpo del correo
    $email_body = "<h2>Nuevo mensaje de contacto</h2>";
    $email_body .= "<p><strong>Nombre y apellido:</strong> $name</p>";
    $email_body .= "<p><strong>Correo electrónico:</strong> $email</p>";
    $email_body .= "<p><strong>Teléfono:</strong> $phone</p>";
    $email_body .= "<p><strong>Mensaje:</strong> $message</p>";

    // Enviar el correo
    if (mail($to, $subject, $email_body, $headers)) {
        // Éxito
        echo json_encode(["status" => "success", "message" => "Mensaje enviado correctamente."]);
    } else {
        // Error
        echo json_encode(["status" => "error", "message" => "Error al enviar el mensaje."]);
    }
} else {
    // Si no es una solicitud POST
    echo json_encode(["status" => "error", "message" => "Método de solicitud no válido."]);
}

