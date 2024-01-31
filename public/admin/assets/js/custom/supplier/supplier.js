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
                         <button  class="btn btn-sm btn-success editSupplier" value="${item.id}">
                         <i class="fa-solid fa-pen-to-square"></i>
                       </button>
                       <button class="btn btn-sm btn-danger deleteSupplier" value="${item.id}">
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
              let data = res.allSupplier?.data;
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

$("#addUpdateSupplierBtn").click(function (e) {
  let btnInnerText = $(this).text();
  console.log(btnInnerText);
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

    if(btnInnerText==="ADD SUPPLIER"){
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
    }
    if(btnInnerText==="UPDATE SUPPLIER"){
      // let id = $(this).attr("value");

      let id = $(this).val();
      // console.log("UPDATE ID === : ",id);

      ajaxSetup();

      $.ajax({
          url: "/supplier/update/"+id,
          type: "POST",
          data: JSON.stringify(supplierData),
          contentType: "application/json",
          success: function (response) {
              console.log("RESPONSE BACK AFTER SUPPLIER POST : ", response);
              if (response.status === "success") {
                  // console.log(response);
                  closeModal("#supplierAddUpdateModal");
                  getAllSuplier()
                  toastr.success("supplier update successfully");
              }
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
      });
    }
    

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
      showSupplierDataTable(response.allSupplier?.data)
      
    },
    error: function(xhr, status, error) {
      console.error('Error:', error);
    }
  });
  // console.log('Search valkues are : ',searchValue);
});
//search by supplier end here


//edit supplier start here 
$(document).on("click", ".editSupplier", function(e) {
  let id = $(this).val(); 
  // console.log("BTN VALUE ",btnValue);

  $("#modal-title").text("Edit Supplier");
  $("#addUpdateSupplierBtn").text("UPDATE SUPPLIER");
  $("#addUpdateSupplierBtn").val(id);
  openModal("#supplierAddUpdateModal");


  $.ajax({
    url: "/supplier/edit/"+id,
    type: "GET",
    success: function (res) {

        if (res.status === "success") {
         
            $("#name").val(res.data.name)
            $("#email").val(res.data.email)
            $("#p_number").val(res.data.phoneNumber)
            $("#address").val(res.data.address)
            
        }
    },
});
});

//edit supplier end here 




//delete supplier start here 
$(document).on("click", ".deleteSupplier", function(e) {
  let id = $(this).val(); 
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url: "/supplier/delete/"+id,
            type: "GET",
            success: function (res) {
                if (res.status === "success") {

                    Swal.fire({
                        title:"Deleted!",
                        text: "Supplier has been deleted.",
                        icon: "success"
                      });
                      getAllSuplier();
                }
            },
        });

    }



  });
});

//delete supplier end here 
