/*
** agregar nuevo registro
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
                    $('#nro_expediente').val('');
                    $('#fecha_ingreso').val('');
                    $('#asunto').val('');
                    $('#procedencia').val('');
                    $('#usuario_responsable').val('');
                    $('#nro_expediente').focus();
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


/*
** editar registro
*/
$(document).ready(function(){
    $('#update_expediente').click(function(){
        var datos=$('#fr_update_expediente_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"../libs/expedientes/update_expediente.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Registro Actualizado Exitosamente!!");
                    window.location.href="main.php";
                }else if(r==-1){
                    alert("Hubo un problema al intentar Actualizar el Ingreso");
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


/*
** actualizar enviar registro
*/
$(document).ready(function(){
    $('#update_enviar_expediente').click(function(){
        var datos=$('#fr_update_enviar_expediente_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"../libs/expedientes/enviar_expediente.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Registro Actualizado Exitosamente!!");
                    window.location.href="main.php";
                }else if(r==-1){
                    alert("Hubo un problema al intentar Actualizar el Ingreso");
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



/*
** eliminar registro
*/
$(document).ready(function(){
    $('#delete_expediente').click(function(){
        //var datos=$('#fr_delete_expediente_ajax').serialize();
        
        var agree = confirm("¿Esta seguro que desea eliminar el registro?");
        
        if(agree){
            
        var datos=$('#fr_delete_expediente_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../libs/expedientes/delete_expediente.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Registro Eliminado Exitosamente!!");
                    window.location.href="main.php";
                }else if(r==-1){
                    alert("Hubo un problema al intentar eliminar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 2){
                    alert("Hay campos en los cuales ingresó caracteres no válidos");
                    console.log("Datos: " + datos);
                }else if(r == 3){
                    alert("No se ha obtenido el ID del Registro!!");
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
        }else{
            return false;
        }

        return false;
    });
});
