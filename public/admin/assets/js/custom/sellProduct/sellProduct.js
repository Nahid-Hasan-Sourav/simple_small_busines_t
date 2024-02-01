$(document).ready(function(){
    //select product 
    
    $("#product_id").change(function(){
     let id = $(this).val();
    
     $.ajax({

        url    : "/sellproduct/select/"+id,
        type   : "GET",
        success: function(res){
            if(res.status === "success"){
               
                console.log("Working ",res.data);
                $("#buyUnitPrice").val(res.data.unitPrice);
                $("#availableQuantity").val(res.data.product?.stock);

            }
           
        }
     })
    });
  });