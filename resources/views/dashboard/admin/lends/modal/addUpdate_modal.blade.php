
<div class="modal fade" id="lendsMoneyAddUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 60%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">LENDS MONEY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" id="customerForm">
      <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <!-- <h6 class="card-body-title">SUPPLIER INFORMATION</h6> -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Select Friends: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">

                <select class="form-control" name="friend_id" id="friend_id">
                    <option value="" disabled selected> -- Select Friends --</option>

                    @foreach($friends as $friend)
                        <option value="{{ $friend->id }}" >{{ $friend->name }}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Amount: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="number" id="amount" name="amount" class="form-control" placeholder="amount">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Back Date: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="date" id="backDate" name="backDate" class="form-control" placeholder="Enter phone number">
                </div>
              </div>


        </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="" id="addUpdateSendMoneyBtn" class="btn btn-primary">SEND MONEY</button>
      </div>
    </div>
  </div>
</div>
