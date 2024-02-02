@extends('dashboard.admin.master')

@section('body')

  <div class="row row-sm mg-t-20 justify-content-center">
    <div class="col-xl-6">
      <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
        <h6 class="card-body-title">ADD FRIEND</h6>
        {{-- <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p> --}}
        <form action="{{ route('friends.store') }}" method="POST">
            @csrf
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
          <div class="form-layout-footer mg-t-30 d-flex justify-content-end">
            <button type="submit" class="btn btn-info mg-r-5">ADD FRIEND</button>
          </div>
        </form>

      </div><!-- card -->
    </div><!-- col-6 -->

  </div>
@endsection
