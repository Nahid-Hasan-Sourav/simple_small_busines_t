@extends('dashboard.admin.master')

@section('body')
<div>
  <div class="card pd-20 pd-sm-40 mg-t-50">
    <div class="d-flex justify-content-end pr-3 my-3">
      <a href="{{ route('sellproduct.create') }}" class="btn btn-success btn-md" style="width: 15%">SELL PRODUCT</a>
    </div>
    @if(session('message'))
    <script>
      Swal.fire({
                title: "PRODUCT!",
                text: "{{ session('message') }}",
                icon: "success"
            });
    </script>
    @endif
    <div class="card-header-title ">
      {{-- <h6 class="">BUY PRODUCT INFO</h6> --}}
      <div class="salary_list_table">
        <div class="row align-items-center">
          <form class="form-group col-md-4" action="{{ route('sellproduct.index') }}" method="GET" id="searchForm">
            <div class="row">
              <div class="col-6">
                <label for="status">Select Month</label>
                <select name="month" class="form-control">
                  <option disabled selected>-- Select Month --</option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
              <div class="col-6">
                <label for="status" class="form-label">Select Customer</label>
                <select class="form-control" name="customer_id" id="customer_id">
                  <option value="" disabled selected> -- Select Customer --</option>

                  @foreach ($customers as $customer)
                  <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </form>
          <div class="salary_submit_common col-md-1 d-flex align-items-end">
            <button class="btn btn-primary btn-md"
              onclick="document.getElementById('searchForm').submit(); return false;">
              <i class="fa-solid fa-magnifying-glass"></i>

            </button>
          </div>
        </div>
      </div>
      {{-- <input type="text" class="form-control w-25" placeholder="search by customer name"> --}}
    </div>
    <div class="table-wrapper">
      <div id="datatable2_wrapper" class="dataTables_wrapper no-footer">
        <table id="datatable2" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid"
          aria-describedby="datatable2_info" style="width: 1546px;">
          <thead>
            <tr role="row">
              <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                style="width: 208px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                Id
              </th>
              <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                style="width: 208px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                Product Name</th>
              <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                style="width: 208px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                Customer Name</th>
              <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                style="width: 208px;" aria-label="Last name: activate to sort column ascending">Sell Quantity</th>
              <th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                style="width: 285px;" aria-label="Position: activate to sort column ascending">Sell Unit Price</th>
              <th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                style="width: 285px;" aria-label="Position: activate to sort column ascending">Totall Sell Price</th>
              <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                style="width: 208px;" aria-label="Start date: activate to sort column ascending">Sell Date</th>
              <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                style="width: 208px;" aria-label="Start date: activate to sort column ascending">Action</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($sellProducts as $sellProduct)
            <tr role="row" class="odd">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $sellProduct->product->name}}</td>
              <td>{{ $sellProduct->customer->name}}</td>
              <td>{{ $sellProduct->quantity}}</td>
              <td>{{ $sellProduct->unitPrice}}</td>
              <td>{{ $sellProduct->totalPrice}}</td>
              <td>{{ \Carbon\Carbon::parse($sellProduct->updated_at)->format('Y-m-d') }}</td>
              <td>
                <a href="{{ route('sellproduct.edit',['id'=>$sellProduct->id]) }}" class="btn btn-sm btn-success ">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form id="delete-form-{{ $sellProduct->id }}" method="POST"
                  action="{{ route('sellproduct.delete',['id'=>$sellProduct->id]) }}" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn btn-sm btn-danger"
                    onclick="confirmDelete({{ $sellProduct->id }})">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </form>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script>
                  function confirmDelete(productId) {
                        Swal.fire({
                            title: 'Are you sure?'
                            , text: 'You want to delete this product!'
                            , icon: 'warning'
                            , showCancelButton: true
                            , confirmButtonColor: '#d33'
                            , cancelButtonColor: '#3085d6'
                            , confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-form-' + productId).submit();
                            }
                        });
                    }

                </script>

              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8">No products found.</td>
            </tr>
            @endforelse


          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection