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

                    alert("La catgoria No se puede Eliminar porque cuenta con subcategorias");
                } else{ if(enviar_reporte == '2'){
                    //alert("Eliminado");
                    //$(e.currentTarget).
                    //bootbox.alert("" + enviar_reporte + " ");
                    alert(" La catgoria No se puede Eliminar porque cuenta con Productos" );
                    //
                    }else{
                        if(enviar_reporte == '3'){
                            alert("Categoria Eliminada");
                            location.reload();
                        }
                    }
                }
            }
        });
    });
});