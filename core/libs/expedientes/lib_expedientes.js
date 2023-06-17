$(document).ready(function(){
      
      $('#expTable').DataTable({
        "order": [[2, "asc"]],
        "responsive":     true,
        "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "deferRender": true,
        "dom":  "Bfrtip",
        buttons: [
            
            {
                extend: 'excel',
                text: 'Export Excel',
                messageTop: 'Expedientes',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Expedientes',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Expedientes',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'print', 
                text: 'Imprimir',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '8pt' );
                                                
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: 'Expedientes',
                autoPrint: false,
                exportOptions: {
                    columns: ':visible',
                }
                
            },
            
              'colvis'
        ],
        columnDefs: [ {
            targets: -1,
            visible: true
        } ],
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Display _MENU_ records",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });
         
    });

/*
/*
** FORMATEO DE TABLA

$(document).ready(function(){
      $('#expTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
        "deferRender": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
*/
/*
** FORMATEO DE TABLA CANTIDAD DE EXPDIENTES POR USUARIOS
*/
$(document).ready(function(){
      $('#groupByUserTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
        "deferRender": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
 
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
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Expediente Agregado Exitosamente</p></div>';
                    document.getElementById('messageNewExp').innerHTML = mensaje;
                    
                    $('#nro_expediente').val('');
                    $('#fecha_ingreso').val('');
                    $('#asunto').val('');
                    $('#procedencia').val('');
                    $('#usuario_responsable').val('');
                    $('#nro_expediente').focus();
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    
                }else if(r==-1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Hubo un problema al intentar Crear el Ingreso</p></div>';
                    document.getElementById('messageNewExp').innerHTML = mensaje;
                    
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    
                }else if(r == 2){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Hay campos en los cuales ingresó caracteres no válidos</p></div>';
                    document.getElementById('messageNewExp').innerHTML = mensaje;
                    
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    
                }else if(r == 3){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Hay Campos sin Completar</p></div>';
                    document.getElementById('messageNewExp').innerHTML = mensaje;
                    
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    
                }
                else if(r == 7){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Sin Conexion a la Base de Datos</p></div>';
                    document.getElementById('messageNewExp').innerHTML = mensaje;
                    
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    
                }
                else if(r == 9){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Sin Conexion a la Base de Datos en la función principal</p></div>';
                    document.getElementById('messageNewExp').innerHTML = mensaje;
                    
                    setTimeout(function() { $(".close").click(); }, 4000);
                    
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
** editar registro
*/
$(document).ready(function(){
    $('#update_egreso').click(function(){
        var datos=$('#fr_update_expediente_egreso_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"../libs/expedientes/update_egreso.php",
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
                if(r == 1){
                    alert("Registro Actualizado Exitosamente!!");
                    window.location.href="main.php";
                }else if(r == -1){
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
                }else if(r == 10){
                    alert("Estoy Aca");
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
    $('#eliminar_exp').click(function(){
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
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Eliminado Exitosamente</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="expedientes"> Ir a Expedientes</button></form>';
                    document.getElementById('messageDeleteExpediente').innerHTML = mensaje;
                    document.getElementById('nro_exp').disabled = true;
                    document.getElementById('asunto').disabled = true;
                    document.getElementById('eliminar_exp').disabled = true;
                    console.log("Datos: " + datos);
                    
                }else if(r==-1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Hubo un problema al intentar el registro</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="expedientes"> Ir a Expedientes</button></form>';
                    document.getElementById('messageDeleteExpediente').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                }else if(r == 3){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> No se ha obtenido el ID del Registro!!</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="expedientes"> Ir a Expedientes</button></form>';
                    document.getElementById('messageDeleteExpediente').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                }
                else if(r == 7){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-ban-circle" aria-hidden="true"></span> Sin Conexión a la Base de Datos!!</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="expedientes"> Ir a Expedientes</button></form>';
                    document.getElementById('messageDeleteExpediente').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                    console.log("Datos: " + datos);
                }
                else if(r == 9){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-ban-circle" aria-hidden="true"></span> Sin Conexión a la Base de Datos en la Función Principal!!</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="expedientes"> Ir a Expedientes</button></form>';
                    document.getElementById('messageDeleteExpediente').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                }
                
                
            }
        });
        }else{
            return false;
        }

        return false;
    });
});


/*
** CARGA DE DATOS DESDE ARCHIVO EXCEL
*/

$(document).ready(function(){
    $('#upload_excel').click(function(){
        
        const form = document.querySelector('#fr_upload_excel_ajax');
        const myfile = document.querySelector('#myfile');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('myfile', myfile.value[0]);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../libs/expedientes/upload_file.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    alert("Archivo cargado en la Base de Datos Exitosamente!!");
                    console.log("Datos: " + values);
                    //window.location.href="main.php";
                    //var url = 'main.php'
                    var form = $('<form action="#" method="post">' +
                      '<input type="hidden" name="expedientes" />' +
                      '</form>');
                    $('body').append(form);
                    form.submit();
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar cargar los datos");
                    console.log("Datos: " + values);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + values);
                }else if(r == 7){
                    alert("Error!!!...Sólo se permiten archivos con extensión [ XLS / XLSX ]");                    
                }else if(r == 13){
                    alert("Error de conexion!!");                    
                }else if(r == 11){
                    alert("Error!!...Hubo un problema al intentar abrir el archivo!!");                    
                }else if(r == 9){
                    alert("Error!!...Debe seleccionar un archivo!");                    
                }
                
            }
        });

        return false;
    
});
});



