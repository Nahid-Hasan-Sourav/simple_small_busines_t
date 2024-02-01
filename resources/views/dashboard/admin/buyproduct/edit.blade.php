@extends('dashboard.admin.master')

@section('body')

  <div class="row row-sm mg-t-20 justify-content-center">
    <div class="col-xl-6">
      <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
        <h6 class="card-body-title">BUY PRODUCT</h6>
        {{-- <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p> --}}
        <form action="{{ route('buyproduct.store') }}" method="POST">
            @csrf
        
            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Select Supplier: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('product')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                <select class="form-control" name="supplier_id" id="supplier_id">
                    <option value="" disabled selected> -- Select Supplier --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" >{{ $product->name }}</option>
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
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" >{{ $supplier->name }}</option>
                    @endforeach
                  </select>             
                </div>
              </div>
              
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Unit Price: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('unit_price')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                  <input type="number" class="form-control" name="unit_price" placeholder="Enter unit price">
                </div>
              </div>

                  
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Quantity: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('quantity')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                  <input type="number" class="form-control" name="quantity" placeholder="Enter quantity">
                </div>
              </div>
              
              <div class="form-layout-footer mg-t-30 d-flex justify-content-end">
                <button type="submit" class="btn btn-info mg-r-5">BUY PRODUCT</button>
                {{-- <button class="btn btn-secondary">Cancel</button> --}}
              </div>
        </form>
       
      </div><!-- card -->
    </div><!-- col-6 -->
   
  </div>
@endsection
