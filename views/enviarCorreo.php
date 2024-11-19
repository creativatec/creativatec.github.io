<?php
session_start();
//controlador
foreach (glob("../controllers/*.php") as $filename) {
    require_once $filename;
}

// Requiere todos los archivos en la carpeta 'models'
foreach (glob("../models/*.php") as $filename) {
    require_once $filename;
}
// Función para crear el cuerpo del correo con archivo adjunto
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Asegúrate de ajustar la ruta si no usas Composer

function enviarCorreoConAdjunto($to, $subject, $message, $filePath, $fileName)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia esto por tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'feliperenjifoz@gmail.com'; // Tu correo electrónico
        $mail->Password = 'eojcvtovqfdueobs'; // Tu contraseña de correo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Puerto SMTP


        // Configurar el remitente y destinatario
        $mail->setFrom('soporte@creativapublicidadytecnologia.com', 'Soporte Creativa');
        $mail->addAddress($to);

        // Adjuntar archivo
        $mail->addAttachment($filePath, $fileName);

        // Contenido del correo
        $mail->isHTML(false); // Si deseas usar HTML, cambia a true
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Enviar correo
        $mail->send();

        // Lógica adicional después de enviar el correo
        $local = new ControladorLocal();
        $res = $local->consultarLocal($_SESSION['id_local']);
        $total = $res[0]['cuota'] - 1;
        $actualizar = new ControladorLocal();
        $resActualizar = $actualizar->actualizarCuotaSistermaLocal($total);

        if ($resActualizar) {
            echo 'Correo enviado exitosamente.';
        } else {
            echo 'Error al actualizar cuota';
        }
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
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
