<?php
// Función para crear el cuerpo del correo con archivo adjunto
function enviarCorreoConAdjunto($to, $subject, $message, $filePath, $fileName)
{
    // Obtener el tipo de contenido del archivo
    $fileType = mime_content_type($filePath);

    // Leer el contenido del archivo
    $fileData = file_get_contents($filePath);

    // Codificar el contenido del archivo en base64
    $encodedFile = chunk_split(base64_encode($fileData));

    // Generar un boundary único
    $boundary = md5(time());

    // Encabezados del correo
    $headers = "From: soporte@creativapublicidadytecnologia.com\r\n";
    $headers .= "Reply-To: soporte@creativapublicidadytecnologia.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

    // Cuerpo del mensaje
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $body .= "$message\r\n";
    $body .= "--$boundary\r\n";
    $body .= "Content-Type: $fileType; name=\"$fileName\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n\r\n";
    $body .= "$encodedFile\r\n";
    $body .= "--$boundary--";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo 'Correo enviado exitosamente.';
    } else {
        echo 'Error al enviar el correo.';
    }
}

// Recuperar datos del formulario
$nombreEstablecimiento = $_POST['nombreEstablecimiento'];
$comprobantePago = $_FILES['comprobantePago'];

// Validar si se ha subido un archivo
if ($comprobantePago['error'] == UPLOAD_ERR_OK) {
    $to = 'feliperenjifoz@gmail.com'; // Dirección del destinatario
    $subject = 'Comprobante de Pago Recibido';
    $message = "Nombre del establecimiento: $nombreEstablecimiento";
    $filePath = $comprobantePago['tmp_name'];
    $fileName = $comprobantePago['name'];

    // Llamar a la función para enviar el correo
    enviarCorreoConAdjunto($to, $subject, $message, $filePath, $fileName);
} else {
    echo 'Error al subir el archivo.';
}
