$(document).ready(function () {
    $('.quant').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        id = $(e.currentTarget).attr("id_aut");
        valor =  $(e.currentTarget).val();
        precio =  $("#subtotal"+id).val();
        nombre =  $("#nombre"+id).val();
        $.ajax({
            url: "./updateC",
            method: 'post',
            data: {
                id: id,
                val: valor,
                pre: precio,
                nom: nombre
            },
            success: function (resul) {
                var enviar_reporte = resul.guardado;
                
                
               
            }   
        });
    });
});