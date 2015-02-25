$(document).ready(function(){
  
  $('input.add-to-cart').on('click',function(){
    
    var product_id = $(this).attr('id');
    
    $.ajax({
        url: CI_ROOT + "cart/addToCart",
        type: "POST",
        dataType: "html",
        async: "false", 
        data: { id: product_id  },
        beforeSend: function () {

            },
        success: function(response) {         
          if(response > 0){
            
            $('span.cart-total').html(response + "$");
            
          }                                                                   
        }   
      });   
  }); 
});
