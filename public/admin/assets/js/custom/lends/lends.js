import { openModal, ajaxSetup, closeModal } from "../common.js";



//show data on table start here
const showLendsMoneyDataTable = (data) => {
  const lendsMoneyTableBody = $("#lendsMoneyTableBody");
  lendsMoneyTableBody.empty();
 console.log("ALL DATA MONEY == ",data)
  if (data?.length > 0) {
      data.forEach((item, index) => {
          console.log("all Lends Amount ",item.amount);
          console.log("all Recaived Amount ",item?.received_money[0]?.amount);

          let paymentStatus = "PENDING";

          let dueAmount='';
          let dueAmountText = ""
          if (item.received_money.length > 0) {
              if (item.amount === item?.received_money[0]?.amount) {
                  paymentStatus = "PAID";
                  console.log("This is from : ");
              }
              else{
                paymentStatus="PARTIAL RECEIVED"
                dueAmountText = "Due Amount = "

              }
          }
          if(paymentStatus==="PARTIAL RECEIVED"){
            dueAmount=item.amount - item?.received_money[0]?.amount
          }
          const row = `<tr>
                     <th scope="row">${index + 1}</th>
                     <td>${item.friend.name}</td>
                     <td>${item.amount}</td>
                     <td>${item.date}</td>
                     <td>
                     ${paymentStatus}<br>
                     ${dueAmountText} ${dueAmount}
                     </td>
                    <td>
                    <button ${paymentStatus === "PAID" ? 'disabled' : ''}
                     class="recaiveMoney btn btn-md btn-success " value="${item.id}">
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
              console.log("All lendsMoney = =  : ", res);
              let data = res.data;
              $("#totalLendsMoney").text( res.totalLendsMoney);
              $("#totallReceivedMoney").text( res.totalReceivedMoney);

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
$("#selectMonth").change(function(){
    let id = $(this).val()
      $.ajax({
    url: "/all-lendsMoney",
    method: 'GET',
    data: {id },
    success: function(response) {
      console.log('Filtered lends money:', response);
      $("#totalLendsMoney").text( response.totalLendsMoney);
      $("#totallReceivedMoney").text( response.totalReceivedMoney);
      showLendsMoneyDataTable(response.data)

    },
    error: function(xhr, status, error) {
      console.error('Error:', error);
    }
  });
})

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



