$(function() {
    
    
});

function confirm_dialog(){
    $( "#dialog-confirm" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Go to cart": function() {
                window.location.href = cart_path;
            },
            "Continue shopping": function() {
            $( this ).dialog( "close" );
            }
        }
    });
}

function add_to_cart(product_id){
    // console.log(product_id);
    $.ajax({
        url: product_ajax_path,
        type: 'POST',
        data : {'p_id': product_id, _token: csrf_token},
        success: function(response){
            confirm_dialog();
        }

    });

}
