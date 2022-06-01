$(function(){
    $("#doc").change(function(){
                  var cc = $("#doc").val(); 
                  buscar(cc);
          });
          $("#pagar").click(function(){
     shop();
      
  }); 
   
   });
   function generar(){
                             var pro = $("#pro").val();
                              var cant = $("#cantidad").val();
                             var prod = $("#pro_can").val(pro+' X'+cant);
                              var total = $("#total").val();
                               var mechan = $("#uno").val();
                               
                                var asd = $("#asd").val();
                            
                             $.ajax({
                type: 'GET',
                data:'pro='+prod+'&mechan='+mechan+'&total='+total+'&cam='+asd,
                url: 'md.php',
            success: function(d){
                var p = eval(d);
                console.log(p);
                $("#llave").val(p[0]);
                $("#codigo").val(p[1]);
                console.log(p[2]);
            }
        });
                         }
                           function buscar(cc){
                            
                            
                             $.ajax({
                type: 'GET',
                data:'cc='+cc,
                url: '../../buscar.php',
            success: function(d){
                var p = eval(d);
                console.log(p);
                $("#nombre").val(p[0]);
                $("#telefono").val(p[1]);
                $("#ema").val(p[2]);
                console.log(p[2]);
            }
        });
                         }
function l(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 46,13];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
   
}
function n(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890";
    especiales = [8, 37, 46,13];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
function ln(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 1234567890áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 46,13];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
function caracteresCorreoValido(){
    var email = $("#ema").val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if (caract.test(email) == false){
        alert("digite un correo valido");
        $("#ema").focus();
        return false;
    }else{

        return true;
    }
} 
function shop(){
    var doc = $("#doc").val();
    var name = $("#nombre").val();
    var co = $("#ema").val();
    var co2 = $("#cema").val();
    var telefono = $("#telefono").val();
    var cantidad = $("#cantidad").val();
    var precio = $("#precio").val();
    var producto = $("#producto").val();
    var codigo = $("#codigo").val();
    var plan = $("#plan").val();

    if(name==''){
        alert("Debe de escribir el nombre completo");
        $("#nombre").focus();
        return false;
    }  
    if(co==''){
        alert("Debe de escribir el correo");
        $("#ema").focus();
        return false;
    }
    if(co2==''){
        alert("Debe de escribir el correo");
        $("#cema").focus();
        return false;
    }
    if(co!==co2){
        alert("El correo digitado no coinciden");
        $("#cema").focus();
        return false;
    }
    if(telefono==''){
        alert("Debe de escribir el telefono");
        $("#telefono").focus();
        return false;
    }
    if(codigo==''){
        alert("No se genero ningun codigo");
        return false;
    }
    $("#pagar").attr("disabled",true);
   

         $.ajax({
            type: 'GET',
            data: 'doc='+doc+'&name='+name+'&co='+co+'&plan='+plan+'&telefono='+telefono+'&cantidad='+cantidad+'&precio='+precio+'&producto='+producto+'&codigo='+codigo+'&sw=1',  //
            url: '../modelo/acciones.php',
            success: function(d){
                
                console.log(d);
                //document.form1.submit();
                location.href = 'checkout_pagar.php?id='+d;
                
            }
           });
    //jg_1220@hotmail.com
}
  function countdown(ano,mes,dia,hora,minuto,segundo){
            var fecha=new Date(ano,mes,dia,hora,minuto,segundo)
             console.log(fecha);
            var hoy=new Date()
            var dias=0
            var horas=0
            var minutos=0
            var segundos=0

            if (fecha>hoy){
                    var diferencia=(fecha.getTime()-hoy.getTime())/1000
                    dias=Math.floor(diferencia/86400)
                    diferencia=diferencia-(86400*dias)
                    horas=Math.floor(diferencia/3600)
                    diferencia=diferencia-(3600*horas)
                    minutos=Math.floor(diferencia/60)
                    diferencia=diferencia-(60*minutos)
                    segundos=Math.floor(diferencia)

                    var q ='Quedan ' + dias + ' D&iacute;as, ' + horas + ' Horas, ' + minutos + ' Minutos, ' + segundos + ' Segundos'

                    if (dias>0 || horas>0 || minutos>0 || segundos>0){
                            $("#contador").html(q);
                            
                    }
            }
            else{
                    document.getElementById('restante').innerHTML='Quedan ' + dias + ' D&iacute;as, ' + horas + ' Horas, ' + minutos + ' Minutos, ' + segundos + ' Segundos'
            }
        }
