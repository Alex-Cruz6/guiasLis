//autocomplet() : 
//Esta función se ejecutará cada vez que cambie el texto 
//en la caja de texto
function autocomplet() {
    //Mínimo de caracteres para que se despliegue el autocomplet
    var min_length = 0; 
    var keyword = $('#country_id').val();
    if (keyword.length >= min_length) {
        $.ajax({
            url: 'ajax_refresh.php',type: 'POST',data: {keyword:keyword},success:function(data){
                $('#country_list_id').show();
                $('#country_list_id').html(data);
            }
        });
    } else { 
        $('#country_list_id').hide(); 
    }
}
//set_item(item) : 
//Esta función se ejecutará cuando seleccionemos uno de los ítems
function set_item(item) {
    //Cambiar el valor de la caja de texto
    $('#country_id').val(item);
    //Ocultar la lista propuesta después de establecer el valor
    $('#country_list_id').hide();
}