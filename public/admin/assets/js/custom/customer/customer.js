import { openModal, ajaxSetup, closeModal } from "../common.js";



//show data on table start here
const showCustomerDataTable = (data) => {
  const customerTableBody = $("#customerTableBody");
  customerTableBody.empty();

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
                         <button  class="btn btn-sm btn-success editcustomer" value="${item.id}">
                         <i class="fa-solid fa-pen-to-square"></i>
                       </button>
                       <button class="btn btn-sm btn-danger deletecustomer" value="${item.id}">
                       <i class="fa-solid fa-trash"></i>
                     </button>
                         </div>
                     </td>
                   </tr>`;
        customerTableBody.append(row);
      });
  } else {
    customerTableBody.append('<tr><td colspan="5">No data available</td></tr>');
  }
};
//get all customer data start here
const getAllCustomer = () => {
  $.ajax({
      url: "/all-customer",
      type: "GET",
      success: function (res) {
          if (res.status === "success") {
              console.log("All customer = =  : ", res);
              let data = res.allcustomer;
              showCustomerDataTable(data);
         }
      },
  });
};

//get all customer data end here

getAllCustomer();

//show data on table end here

$("#addCustomerBtn").click(function () {
    $("#customerForm")[0].reset();
    openModal("#customerAddUpdateModal");
});

$("#addUpdateCustomerBtn").click(function (e) {
  let btnInnerText = $(this).text();
//   console.log(btnInnerText);
    let name = $("#name").val();
    let email = $("#email").val();
    let phoneNumber = $("#p_number").val();
    let address = $("#address").val();

    const customerData = {
        name,
        email,
        phoneNumber,
        address,
    };

    if(btnInnerText==="ADD CUSTOMER"){
      ajaxSetup();

    $.ajax({
        url: "/customer/store",
        type: "POST",
        data: JSON.stringify(customerData),
        contentType: "application/json",
        success: function (response) {
            console.log("RESPONSE BACK AFTER customer POST : ", response);
            if (response.status === "success") {
                // console.log(response);
                closeModal("#customerAddUpdateModal");
                getAllCustomer();
                toastr.success("customer added successfully");
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
    if(btnInnerText==="UPDATE CUSTOMER"){
      // let id = $(this).attr("value");

      let id = $(this).val();
      // console.log("UPDATE ID === : ",id);

      ajaxSetup();

      $.ajax({
          url: "/customer/update/"+id,
          type: "POST",
          data: JSON.stringify(customerData),
          contentType: "application/json",
          success: function (response) {
              console.log("RESPONSE BACK AFTER customer POST : ", response);
              if (response.status === "success") {
                  // console.log(response);
                  closeModal("#customerAddUpdateModal");
                  getAllCustomer()
                  toastr.success("customer update successfully");
              }
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
      });
    }
    

    console.log("customer DATA === : ", customerData);
});


//search by customer start here
$("#searchCustomerByName").on('input',function(e){
  let searchValue = $(this).val();


  $.ajax({
    url: "/all-customer", 
    method: 'GET',
    data: {searchValue },
    success: function(response) {
      // console.log('Filtered customers:', response.allcustomer);
      showCustomerDataTable(response.allcustomer)
      
    },
    error: function(xhr, status, error) {
      console.error('Error:', error);
    }
  });
  // console.log('Search valkues are : ',searchValue);
});
//search by customer end here


//edit customer start here 
$(document).on("click", ".editcustomer", function(e) {
  let id = $(this).val(); 
  // console.log("BTN VALUE ",btnValue);

  $("#modal-title").text("Edit Customer");
  $("#addUpdateCustomerBtn").text("UPDATE CUSTOMER");
  $("#addUpdateCustomerBtn").val(id);
  openModal("#customerAddUpdateModal");


  $.ajax({
    url: "/customer/edit/"+id,
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

//edit customer end here 




//delete customer start here 
$(document).on("click", ".deletecustomer", function(e) {
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
            url: "/customer/delete/"+id,
            type: "GET",
            success: function (res) {
                if (res.status === "success") {

                    Swal.fire({
                        title:"Deleted!",
                        text: "customer has been deleted.",
                        icon: "success"
                      });
                      getAllCustomer();
                }
            },
        });

    }



  });
});

//delete customer end here 
