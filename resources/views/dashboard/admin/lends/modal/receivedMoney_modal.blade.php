
<div class="modal fade" id="receiveMoneyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 60%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">RECEIVED MONEY</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="modal-body" id="customerForm">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

                <div class="row mg-t-20">
                  <label class="col-sm-5 form-control-label">Receive Amount: <span class="tx-danger">*</span></label>
                  <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                    <input type="number" id="receive_amount" name="amount" class="form-control" placeholder="amount">
                  </div>
                </div>



          </div>
        </form>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" value="" id="receiveMoneyBtn" class="btn btn-primary">RECEIVE MONEY</button>
        </div>
      </div>
    </div>
  </div>
