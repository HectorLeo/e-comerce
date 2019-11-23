$(document).ready(function () {
    $('.ventana_popup').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        id_vent = $(e.currentTarget).attr("id_ventanapopup");
        
        $.ajax({
            url: "./ventana_PopUp",
            method: 'get',
            data: {
                id: id_vent
            },
            success: function (resul) {

                var nombre = resul.nombre;
                var precioD = resul.precioD;
                var precioN = resul.precioN;
                var resumen = resul.resumen;
                var existencias = resul.existencias;
                var imagen = resul.imagen;
                console.log(imagen)
                var nuevop = 0;
                $('#nombre_popup').html(
                    '<h2 class="product-name" id="nombre">'+nombre+'</h2>');

                if(precioD != 0){
                    
                    $('#precio_popup').html('<h3 class="product-price">$-'+precioD+' <del class="product-old-price">'+precioN+'</del></h3>');
                    
                }
                if(precioD == 0){
                    $('#precio_popup').html('<h3 class="product-price">$'+precioD+' <del class="product-old-price"></del></h3>');
                }
                    
                if(existencias<=2){
                    $('#precio_popup').html('<span class="product-available">En Stock</span>');
                }
                $('#resumen_popup').html('<p >'+resumen+'</p>');
                if(existencias==0){
                    $('#existencias_popup').html('<input class="input" type="number" value="0"  min="0" max="'+existencias+'">');
                }
                 if(existencias!=0){
                    $('#existencias_popup').html('<h5><input class="input" type="number" value="1"  min="1" max="'+existencias+'"></h5>');
                 }
                 $('#imagen_popup').html('<img src="'+imagen+'" alt="imagen del producto">');
                 

            }
        }); 
    });
    
});