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
            url: "./transporteE", 
            method: 'post',
            data: {
                id: id_delete,
                val: valor
            },
            success: function (resul) {

                var enviar_reporte = resul.guardado;

                if(enviar_reporte == 'activo'){
                    alert("Transportista Activado");
                    location.reload();
                }else{ 
                    if(enviar_reporte == 'desactivo'){
                        alert("Transportista Desactivado");
                        location.reload();
                    } 
                }    
            }
        });
    });
});