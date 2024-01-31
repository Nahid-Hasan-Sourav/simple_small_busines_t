
<div class="modal fade" id="supplierAddUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 60%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">ADD SUPPLIER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" id="supplierForm">
      <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <!-- <h6 class="card-body-title">SUPPLIER INFORMATION</h6> -->
              <div class="row">
                <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Phone: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="tel" id="p_number" name="p_number" class="form-control" placeholder="Enter phone number">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" class="form-control" id="address" name="address" placeholder="Enter your address"></textarea>
                </div>
              </div>
             
        </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="" id="addUpdateSupplierBtn" class="btn btn-primary">ADD SUPPLIER</button>
      </div>
    </div>
  </div>
</div>