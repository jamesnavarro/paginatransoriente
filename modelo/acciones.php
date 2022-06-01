<?php
include('conexioni.php');
session_start();

switch ($_GET['sw']) {
        case 1:
            $doc=$_GET['doc'];
            $name=$_GET['name'];
            $co=$_GET['co'];
            $telefono=$_GET['telefono'];
            $cantidad=$_GET['cantidad'];
            $precio=$_GET['precio'];
            $producto=$_GET['producto'];
            $codigo=$_GET['codigo'];
            $plan=$_GET['plan'];
            $result= mysqli_query($con," select count(referencia) from pagosweb where referencia='$codigo' ");
             $f = mysqli_fetch_array($result); 
             if($f[0]==0){
             
                mysqli_query($con,"insert into pagosweb (id_plan,nit,empresa,telefono,email,producto,meses,valor,referencia,estado,fecha_pago,tipopago)"
                               . " values('$plan','$doc','$name','$telefono','$co','$producto','$cantidad','$precio','$codigo','En proceso','".date("Y-m-d").' '.$hora."','Payu') ");
            $f= mysqli_insert_id($con);
            echo $decodificado = base64_encode($f+999999999999999);
             }else{
                 mysqli_query($con,"update pagosweb set id_plan='$plan', nit='$doc', empresa='$name',telefono='$telefono', email='$co',producto='$producto',valor='$precio',meses='$cantidad' where referencia='$codigo'");
             }
           
           
            break;
        case 2:
            $id=$_GET['id'];
             $result= mysqli_query($con," select * from bodegas where id_bodega='$id' and id_empresa='$emp' ");
             $f = mysqli_fetch_array($result);  
             $p = array();
             $p[0] = $f[0];
             $p[1] = $f[1];
             $p[2] = $f[2];
             echo json_encode($p);
            break;
        case 3:
            $id=$_GET['id'];
             $result= mysqli_query($con,"delete from bodegas where id_bodega='$id' and id_empresa='$emp' ");
            
            break;
            
}
