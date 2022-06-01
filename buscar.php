<?php
include 'modelo/conexioni.php';
$cc = $_GET['cc'];
$result = mysqli_query($con, "select * from empresas where nit='$cc' ");
$c = mysqli_fetch_array($result);
$p = array();
$p[0] = $c['empresa'];
$p[1] = $c['telefonos'];
$p[2] = $c['email'];
echo json_encode($p);

