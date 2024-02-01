@extends('dashboard.admin.master')

@section('body')
{{-- <div class="card pd-20 pd-sm-40 mg-t-50">
    <div class="d-flex justify-content-end pr-3 my-3">
        <a href="{{ route('product.create') }}" class="btn btn-success btn-md" style="width: 15%">ADD  PRODUCT</a>
    </div>
    <div class="card-header-title d-flex justify-content-between mb-3 pr-3">
    <h6 class="">All  PRODUCT</h6>
    <input type="text"  class="form-control w-25" placeholder="search by  product name">
    </div>
    
  </div> --}} 
  <div class="row row-sm mg-t-20 justify-content-center">
    <div class="col-xl-6">
      <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
        <h6 class="card-body-title">ADD PRODUCT</h6>
        {{-- <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p> --}}
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="row">
                <label class="col-sm-4 form-control-label">Product Name: <span class="tx-danger">*</span></label>
                
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('name')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                  <input type="text" class="form-control" name="name" placeholder="Enter product name">
                </div>
              </div>
              <!-- row -->
              {{-- <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Quantity: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                @error('quantity')
                    <small class="bg-danger text-white my-2">{{ $message }}</small>
                @enderror
                  <input type="number" class="form-control" name="quantity" placeholder="Enter quantity">
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
              </div> --}}
              
              <div class="form-layout-footer mg-t-30 d-flex justify-content-end">
                <button type="submit" class="btn btn-info mg-r-5">ADD PRODUCT</button>
                {{-- <button class="btn btn-secondary">Cancel</button> --}}
              </div>
        </form>
       
      </div><!-- card -->
    </div><!-- col-6 -->
   
  </div>
@endsection
