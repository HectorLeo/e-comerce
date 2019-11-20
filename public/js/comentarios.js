$(document).ready(function () {
    $('.delete_user').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        id_delete = $(e.currentTarget).attr("id_delete");
        valor =  $(e.currentTarget).val();
        $.ajax({
            url: "./comentariosE",
            method: 'post',
            data: {
                id: id_delete,
                val: valor
            },
            success: function (resul) {

                var enviar_reporte = resul.guardado;
                valor =  $(e.currentTarget).val();
                
                if(enviar_reporte == 'activo'){
                    alert("Comentario Activado");
                    location.reload();
                }else{ 
                    if(enviar_reporte == 'desactivo'){
                        alert("Comentario Desactivado");
                        location.reload();
                    } 
                }     
                
            }
        });
    });

   //insertar comentarios a la base de datos
   $('.insertar_coment').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        //id_delete = $(e.currentTarget).attr("id_delete");
        correoc =  $("#email_usuario").val();
        
        comentarioc =  $("#comentario").val();
        id_productoc =  $("#id_producto").val();
       
        contc=0;
        i=0;
        for( i=1;i<6;i++){
            if($("#star"+i).is(':checked')){
                contc=i;
            }
        }
       
        $.ajax({
            url: "http://127.0.0.1:8000/cliente/comentariosI",
            method: 'get',
            data: {
                correo: correoc,
                comentario: comentarioc,
                id_producto: id_productoc,
                cont: contc
            },
            success: function (resul) {

                var enviar_reporte = resul.guardado;
                
                alert("El comentario se a enviado correctamente");
                
                
            }
        });
    });


});