<?php
    $con=mysqli_connect('localhost', 'efxcomco_james', 'Dioseressupremo2018', 'efxcomco_admin');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

    date_default_timezone_set("America/Bogota" ) ; 
    $hora = date('H:i:s',time() - 3600*date('I'));
    
            
?>