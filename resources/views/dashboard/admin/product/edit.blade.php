@extends('dashboard.admin.master')

@section('body')
  <div class="row row-sm mg-t-20 justify-content-center">
    <div class="col-xl-6">
      <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
        <h6 class="card-body-title">EDIT PRODUCT</h6>
        {{-- <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p> --}}
        <form action="{{ route('product.update',['id'=>$product->id]) }}" method="POST">
            @csrf
            <div class="row">
                <label class="col-sm-4 form-control-label">Product Name: <span class="tx-danger">*</span></label>
                
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" value="{{ $product->name }}" name="name" placeholder="Enter product name">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Quantity: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            
                  <input type="number" class="form-control" value="{{ $product->quantity }}" name="quantity" placeholder="Enter quantity">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Unit Price: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="number" class="form-control" value={{ $product->unit_price }} name="unit_price" placeholder="Enter unit price">
                </div>
              </div>
              
              <div class="form-layout-footer mg-t-30 d-flex justify-content-end">
                <button type="submit" class="btn btn-info mg-r-5">UPDATE PRODUCT</button>
              
              </div>
        </form>
       
      </div><!-- card -->
    </div><!-- col-6 -->
   
  </div>
@endsection
