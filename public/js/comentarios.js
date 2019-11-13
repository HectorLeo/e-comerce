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
});