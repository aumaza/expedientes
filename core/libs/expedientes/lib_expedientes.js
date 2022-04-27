/*
** agregar nuevo usuario
*/
$(document).ready(function(){
    $('#add_nuevo_expediente').click(function(){
        var datos=$('#fr_nuevo_expediente_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"../libs/expedientes/nuevo_expediente.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Ingreso Creado Exitosamente!!");
                    $('#nombre').val('');
                    $('#email').val('');
                    $('#nombre').focus();
                    console.log("Datos: " + datos);
                }else if(r==-1){
                    alert("Hubo un problema al intentar Crear el Ingreso");
                    console.log("Datos: " + datos);
                }else if(r == 2){
                    alert("Hay campos en los cuales ingresó caracteres no válidos");
                    console.log("Datos: " + datos);
                }else if(r == 3){
                    alert("No ha ingresado datos aún!!");
                    console.log("Datos: " + datos);
                }
                else if(r == 7){
                    alert("No hay Conexion a la base de datos");
                    console.log("Datos: " + datos);
                }
                else if(r == 9){
                    alert('Sin Conexion en la función principal');
                }
                
                
            }
        });

        return false;
    });
}); 
