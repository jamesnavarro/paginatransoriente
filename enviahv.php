<?php
$Nombre = $_POST['nombre'];
$apell = $_POST['apellido'];
$tipdoc = $_POST['tipo_doc'];
$numdoc = $_POST['num_doc'];
$Email = $_POST['correo'];
$archivo = $_POST['archivo'];
  
require("archivosmail/class.phpmailer.php");
$mail = new PHPMailer();


$mail->From     = $Email;
$mail->FromName = $Nombre;
$mail->AddAddress("jg_1220@hotmail.com");


$mail->WordWrap = 50; 
$mail->IsHTML(true);     
$mail->Subject  =  "Contacto";
$mail->Body     =  "Nombre: $Nombre \n<br />".    
"Email: $Email \n<br />".    
"Mensaje: $Mensaje \n<br />";
$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);


$mail->IsSMTP(); 
$mail->Host = "ssl://smtp.gmail.com:465"; //Servidor de Salida.
$mail->SMTPAuth = true; 
$mail->Username = "sistemas.templado@gmail.com"; //Correo Electrónico
$mail->Password = "luzdemivida0318mihijo*"; //Contraseña

if ($mail->Send())
     echo "<script>alert('Formulario enviado exitosamente.');</script>";
else
     echo "<script>alert('Error al enviar el formulario');</script>";

?>