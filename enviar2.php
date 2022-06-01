<?php
$nombre = $_POST['nombre'];
$mail = $_POST['email'];
$empresa = $_POST['mensaje'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'servicioalcliente@transorientesas.com,jg_1220@hotmail.com';
$asunto = 'Sitio web Transoriente S.A.S';

mail($para, $asunto, utf8_decode($mensaje), $header);
echo '<script type="text/javascript">alert("tu mensaje fue enviado con exito");window.location.href="https://transoriente.softmediko.com/";</script>';
?>