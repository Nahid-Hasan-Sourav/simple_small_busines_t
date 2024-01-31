import {openModal,ajaxSetup} from "../common.js"

  $("#addSupplierBtn").click(function(){
    openModal("#supplierAddUpdateModal")
    
  })

  // $("#addUpdateSupplierBtn").click(function(){
  //   let name        = $("#name").val();
  //   let email       = $("#email").val();
  //   let phoneNumber = $("#p_number").val();
  //   let address     = $("#address").val();

  //   const supplierData={
  //     name,
  //     email,
  //     phoneNumber,
  //     address
  //   }

  //   ajaxSetup();

  //   $.ajax({
  //     url: "/supplier/store",
  //     type: "POST",
  //     data: { supplierData },
  //     success: function (response) {
  //       console.log("RESPONSE BACK AFTER SUPPLIER POST : ",response);
  //     },
  //     error: function (xhr, status, error) {
  //         console.log("Error: ", error);
  //         var response = JSON.parse(xhr.responseText);
  //         console.log("Error Message: ", response.message);
  //     },
  // });

  //   console.log("SUPPLIER DATA === : ",supplierData);
  // })
  $("#addUpdateSupplierBtn").click(function(){
    let name        = $("#name").val();
    let email       = $("#email").val();
    let phoneNumber = $("#p_number").val();
    let address     = $("#address").val();

    const supplierData={
        name,
        email,
        phoneNumber,
        address
    };

    // ajaxSetup();
    $.ajaxSetup({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
  });

  $.ajax({
    url: "/supplier/store",
    type: "POST",
    data: JSON.stringify(supplierData),
    contentType: 'application/json',
    success: function (response) {
        console.log("RESPONSE BACK AFTER SUPPLIER POST : ", response);
        if (response.status === "failed") {
            // response.message.forEach(function (errorMessage) {
                console.log(response);
            // });
        }
    },
    error: function (xhr, status, error) {
      console.log("Error: ", error);
      console.log("Error Message: ", xhr.responseJSON.message); // Log the general error message
      
      if (xhr.responseJSON && xhr.responseJSON.errors) {
          // Loop through the errors object and log each error message
          Object.keys(xhr.responseJSON.errors).forEach(function(field) {
              xhr.responseJSON.errors[field].forEach(function(errorMessage) {
                  console.log(field + ": " + errorMessage);
                  toastr.error("Validation Error: " + errorMessage);
              });
          });
      }
  },
  
});


    console.log("SUPPLIER DATA === : ",supplierData);
});

  

