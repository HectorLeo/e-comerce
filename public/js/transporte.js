$(document).ready(function () {
    $('.delete_user').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        id_delete = $(e.currentTarget).attr("id_delete");
        $.ajax({
            url: "./categoriaE",
            method: 'post',
            data: {
                id: id_delete
            },
            success: function (resul) {

                var enviar_reporte = resul.guardado;

                if (enviar_reporte == '1') {

                    alert("El transporte no se puede eliminar hay pedido(s) que lo estan usando");
                } else{ 
                        if(enviar_reporte == '3'){
                            alert("Transporte Eliminado");
                            location.reload();
                        }
                    
                }
            }
        });
    });
});