function add_to_cart(product_id){
    // console.log(product_id);
    $.ajax({
        url: product_ajax_path,
        type: 'POST',
        data : {'p_id': product_id, _token: csrf_token},
        success: function(response){
            alert(response);
        }

    });

}
