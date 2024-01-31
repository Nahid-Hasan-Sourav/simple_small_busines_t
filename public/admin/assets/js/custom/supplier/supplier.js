import { openModal, ajaxSetup, closeModal } from "../common.js";


//show data on table start here
const showSupplierDataTable = (data) => {
  const supplierTableBody = $("#supplierTableBody");
  supplierTableBody.empty();

  if (data.length > 0) {
      data.forEach((item, index) => {
          console.log(item);
          const row = `<tr>
                     <th scope="row">${index + 1}</th>
                     <td>${item.name}</td>
                     <td>${item.email}</td>
                     <td>${item.phoneNumber}</td>
                     <td>${item.address}</td>
                     <td>
                         <div class="div">
                         <button class="btn btn-sm btn-success">
                         <i class="fa-solid fa-pen-to-square"></i>
                       </button>
                       <button class="btn btn-sm btn-danger">
                       <i class="fa-solid fa-trash"></i>
                     </button>
                         </div>
                     </td>
                   </tr>`;
        supplierTableBody.append(row);
      });
  } else {
    supplierTableBody.append('<tr><td colspan="5">No data available</td></tr>');
  }
};
//get all supplier data start here
const getAllSuplier = () => {
  $.ajax({
      url: "/all-supplier",
      type: "GET",
      success: function (res) {
          if (res.status === "success") {
              console.log("All SUPPLIER = =  : ", res);
              let data = res.allSupplier;
              showSupplierDataTable(data);
          }
      },
  });
};
//get all supplier data end here

getAllSuplier();

//show data on table end here

$("#addSupplierBtn").click(function () {
    $("#supplierForm")[0].reset();
    openModal("#supplierAddUpdateModal");
});

$("#addUpdateSupplierBtn").click(function () {
    let name = $("#name").val();
    let email = $("#email").val();
    let phoneNumber = $("#p_number").val();
    let address = $("#address").val();

    const supplierData = {
        name,
        email,
        phoneNumber,
        address,
    };

    ajaxSetup();

    $.ajax({
        url: "/supplier/store",
        type: "POST",
        data: JSON.stringify(supplierData),
        contentType: "application/json",
        success: function (response) {
            console.log("RESPONSE BACK AFTER SUPPLIER POST : ", response);
            if (response.status === "success") {
                // console.log(response);
                closeModal("#supplierAddUpdateModal");
                getAllSuplier()
                toastr.success("supplier added successfully");
            }
        },
        error: function (xhr, status, error) {
            console.log("Error: ", error);
            console.log("Error Message: ", xhr.responseJSON.message); // Log the general error message

            if (xhr.responseJSON && xhr.responseJSON.errors) {
                Object.keys(xhr.responseJSON.errors).forEach(function (field) {
                    xhr.responseJSON.errors[field].forEach(function (
                        errorMessage
                    ) {
                        console.log(field + ": " + errorMessage);
                        toastr.error("Validation Error: " + errorMessage);
                    });
                });
            }
        },
    });

    console.log("SUPPLIER DATA === : ", supplierData);
});


//search by supplier start here
$("#searchSupplierByName").on('input',function(e){
  let searchValue = $(this).val();


  $.ajax({
    url: "/all-supplier", 
    method: 'GET',
    data: {searchValue },
    success: function(response) {
      // console.log('Filtered suppliers:', response.allSupplier);
      showSupplierDataTable(response.allSupplier)
      
    },
    error: function(xhr, status, error) {
      console.error('Error:', error);
    }
  });
  // console.log('Search valkues are : ',searchValue);
});

//search by supplier end here