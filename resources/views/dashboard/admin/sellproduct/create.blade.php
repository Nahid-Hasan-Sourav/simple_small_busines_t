@extends('dashboard.admin.master')

@section('body')

  <div class="row row-sm mg-t-20 justify-content-center">
    <div class="col-xl-6">
      <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
        <h6 class="card-body-title">SELL PRODUCT</h6>
        {{-- <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p> --}}
        <form action="{{ route('sellproduct.store') }}" method="POST">
            @csrf
        
            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Select Customer: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('product')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                <select class="form-control" name="customer_id" id="customer_id">
                    <option value="" disabled selected> -- Select Customer --</option>
                  
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" >{{ $customer->name }}</option>
                    @endforeach
                </select>             
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Select Product: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('product')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                <select class="form-control" name="product_id" id="product_id">
                    <option value="" disabled selected> -- Select Product --</option>
                    @foreach ($buyProducts as $buyProduct)
                    <option value="{{ $buyProduct->id }}" >{{ $buyProduct->product->name }}</option>
                    @endforeach
                  </select>             
                </div>
              </div>
              
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Buying Unit Price: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('unit_price')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                  <input type="number" class="form-control" id="buyUnitPrice" name="buying_unit_price" disabled>
                </div>
              </div>

                  
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Available Quantity: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('quantity')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                  <input type="number" class="form-control" id="availableQuantity" name="available_quantity" disabled>
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Sell Quantity: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('quantity')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                  <input type="number" class="form-control" id="sellQuantity" name="sell_quantity" placeholder="Enter quantity">
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Sell Unit Price: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('unit_price')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                  <input type="number" class="form-control" id="sellUnitPrice" name="sell_unit_price">
                </div>
              </div>
              
              <div class="form-layout-footer mg-t-30 d-flex justify-content-end">
                <button type="submit" class="btn btn-info mg-r-5">BUY PRODUCT</button>
              </div>
        </form>
       
      </div><!-- card -->
    </div><!-- col-6 -->
   
  </div>
@endsection
