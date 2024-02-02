import { openModal, ajaxSetup, closeModal } from "../common.js";



//show data on table start here
const showLendsMoneyDataTable = (data) => {
  const lendsMoneyTableBody = $("#lendsMoneyTableBody");
  lendsMoneyTableBody.empty();
 console.log("ALL DATA MONEY == ",data)
  if (data?.length > 0) {
      data.forEach((item, index) => {
          console.log("all money",item);
          const row = `<tr>
                     <th scope="row">${index + 1}</th>
                     <td>${item.friend.name}</td>
                     <td>${item.amount}</td>
                     <td>${item.date}</td>
                     <td>PENDING</td>
                    <td>
                    <button class="recaiveMoney btn btn-md btn-success " value="${item.id}">
                    RECEIVE
                    </button>
                    </td>
                   </tr>`;
                   lendsMoneyTableBody.append(row);
      });
  } else {
    lendsMoneyTableBody.append('<tr><td colspan="5">No data available</td></tr>');
  }
};
//get all customer data start here
const getAllLendsMoneyInfo = () => {
  $.ajax({
      url: "/all-lendsMoney",
      type: "GET",
      success: function (res) {
          if (res.status === "success") {
              console.log("All customer = =  : ", res);
              let data = res.data;
              showLendsMoneyDataTable(data);
         }
      },
  });
};

//get all customer data end here

getAllLendsMoneyInfo();

//show data on table end here

$("#addLendsMoneyBtn").click(function () {
    $("#customerForm")[0].reset();
    openModal("#lendsMoneyAddUpdateModal");
});

$("#addUpdateSendMoneyBtn").click(function (e) {
  let btnInnerText = $(this).text();
//   console.log(btnInnerText);
    let friendId = $("#friend_id").val();
    let amount   = $("#amount").val();
    let backDate = $("#backDate").val();

    const lendsMoney = {
        friendId,
        amount,
        backDate,

    };

    // console.log("SEND MONEY == : ",lendsMoney);

    if(btnInnerText==="SEND MONEY"){
      ajaxSetup();

    $.ajax({
        url: "/lends/money/store",
        type: "POST",
        data: JSON.stringify(lendsMoney),
        contentType: "application/json",
        success: function (response) {
            console.log("RESPONSE BACK AFTER SEND MONEY POST : ", response);
            if (response.status === "success") {
                // console.log(response);
                closeModal("#lendsMoneyAddUpdateModal");
                getAllLendsMoneyInfo();
                toastr.success("MONEY SEND'S ");
            }
        },
        error: function (xhr, status, error) {
            console.log("Error: ", error);
            console.log("Error Message: ", xhr.responseJSON.message); // Log the general error message

        },
    });
    }



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
$(document).on("click", ".recaiveMoney", function(e) {
  let id = $(this).val();
  openModal("#receiveMoneyModal");
$("#receiveMoneyBtn").val(id);

});

//edit customer end here

$("#receiveMoneyBtn").click("click",function(e){
    let id = $(this).val();
    let receiveAmount = $("#receive_amount").val();

    const reaceivedData ={
        id,
        receiveAmount

    }
    console.log("received amount data",reaceivedData);
    ajaxSetup();

    $.ajax({
        url: "/lends/money/receive",
        type: "POST",
        data: JSON.stringify(reaceivedData),
        contentType: "application/json",
        success: function (response) {
            console.log("RESPONSE BACK AFTER RECEIVE MONEY POST : ", response);
            if (response.status === "success") {
                console.log(response);
                closeModal("#receiveMoneyModal");

                getAllLendsMoneyInfo();
                toastr.success("MONEY RECEIVED ");
            }
        },
        error: function (xhr, status, error) {
            console.log("Error: ", error);
            console.log("Error Message: ", xhr.responseJSON.message); // Log the general error message

        },
    });
})



