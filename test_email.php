<?php


    // Obtener los datos del formulario
    $name = "test";
    $email = "gabriel.adrian.felipe@gmail.com";
    $phone ="1111";
    $message = "test demo";

    // Configurar el correo
    $to = "gabriel.adrian.felipe@gmail.com"; // Cambia esto a tu dirección de correo
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

    $cabeceras = 'From: hola@estudio-malu.com' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type: text/html; charset=iso-8859-1' . "\r\n".
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();

    //$result=mail($para, $titulo, $mensaje, $cabeceras);


    // Enviar el correo
    if (mail($to, $subject, $email_body, $cabeceras)) {
        // Éxito
        echo json_encode(["status" => "success", "message" => "Mensaje enviado correctamente."]);
    } else {
        // Error
        echo json_encode(["status" => "error", "message" => "Error al enviar el mensaje."]);
    }
