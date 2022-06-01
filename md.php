<?php
include 'modelo/conexion2.php';
//$apikey = '4Vj8eK4rloUd272L48hsrarnUA';
//$apikey = '13618887b0f'; la que se cambio 30 de julio
$apikey = '9716GYbFI8FXN9X7qooUgQJXG5';
$mechan = $_GET['mechan'];
$pro = $_GET['pro'];
$total= $_GET['total'];
$cam= $_GET['cam'];
$query = mysqli_query($con, "SELECT codigo_fotopr7 FROM `wp_codigos` where estado_cod='Sin Usar' and id_campana=$cam order by RAND() LIMIT 1");
$c = mysqli_fetch_row($query);
$codi = 'PHOTOBOOKIMP'.date("YmdHis");
$pasar = '4Vj8eK4rloUd272L48hsrarnUA~508029~TestPayU~20000~COP';
$firma = md5($apikey.'~'.$mechan.'~'.$codi.'~'.$total.'~COP');

$p = array();
$p[0]=$firma; 
$p[1]=$codi;
$p[2]=('"'.$apikey.'~'.$mechan.'~'.$codi.'~'.$total.'~COP"');
echo json_encode($p); 
exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
