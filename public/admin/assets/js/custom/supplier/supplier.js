import {openModal,ajaxSetup} from "../common.js"

  $("#addSupplierBtn").click(function(){
    openModal("#supplierAddUpdateModal")
    
  })

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
    }

    ajaxSetup();

    $.ajax({
      url: "/supplier/store",
      type: "POST",
      data: { supplierData },
      success: function (response) {
        console.log("RESPONSE BACK AFTER SUPPLIER POST : ",response);
      },
      error: function (xhr, status, error) {
          console.log("Error: ", error);
          var response = JSON.parse(xhr.responseText);
          console.log("Error Message: ", response.message);
      },
  });

    console.log("SUPPLIER DATA === : ",supplierData);
  })
  

