@extends('dashboard.admin.master')

@section('body')
<div>
  <div class="card pd-20 pd-sm-40 mg-t-50">
    <div class="d-flex justify-content-end pr-3 my-3">
        @if($sellTotalPriceSum > $buyTotalPriceSum)
        <h4 class="text-success">
            {{ \Carbon\Carbon::parse($sellProducts[0]['created_at'])->format('F') }} Month Profit = {{ $sellTotalPriceSum - $buyTotalPriceSum }}TK
        </h4>
        @elseif($sellTotalPriceSum < $buyTotalPriceSum)
        <h4 class="text-danger">
            {{ \Carbon\Carbon::parse($sellProducts[0]['created_at'])->format('F') }} Month Loss = {{$buyTotalPriceSum - $sellTotalPriceSum}}TK

        </h4>

        @endif

    </div>


    <div class="card-header-title ">
      <div class="salary_list_table">
        <div class="row align-items-center">

          <form class="form-group col-md-4" action="{{ route('report.index') }}" method="GET" id="searchForm">
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

              <div class="salary_submit_common col-md-1 d-flex align-items-center mt-4">
                <button class="btn btn-primary btn-md"
                  onclick="document.getElementById('searchForm').submit(); return false;">
                  <i class="fa-solid fa-magnifying-glass"></i>

                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
      {{-- <input type="text" class="form-control w-25" placeholder="search by customer name"> --}}
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex justify-content-between">
                <h6>SELL PRODUCT TABLE</h6>
                <h6>Totall Price :{{ $sellTotalPriceSum }}</h6>
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
                          style="width: 208px;" aria-label="Last name: activate to sort column ascending">Quantity</th>

                        <th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                          style="width: 285px;" aria-label="Position: activate to sort column ascending">Totall Price</th>


                      </tr>
                    </thead>
                    <tbody>

                      @forelse ($sellProducts as $sellProduct)
                      <tr role="row" class="odd">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sellProduct->product->name}}</td>
                        <td>{{ $sellProduct->customer->name}}</td>
                        <td>{{ $sellProduct->quantity}}</td>
                        <td>{{ $sellProduct->totalPrice}}</td>

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
        <div class="col-md-6">

               <div class="d-flex justify-content-between">
                <h6>BUY PRODUCT TABLE</h6>
                <h6>Totall Price :{{ $buyTotalPriceSum }}</h6>
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
                                Supplier Name</th>
                              <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                                style="width: 208px;" aria-label="Last name: activate to sort column ascending">Quantity</th>

                              <th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"
                                style="width: 285px;" aria-label="Position: activate to sort column ascending">Totall Price</th>


                            </tr>
                          </thead>
                        <tbody>

                            @forelse ($buyProducts as $buyProduct)
                            <tr role="row" class="odd">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $buyProduct->product->name}}</td>
                              <td>{{ $buyProduct->supplier->name}}</td>
                              <td>{{ $buyProduct->quantity}}</td>

                              <td>{{ $buyProduct->totalPrice}}</td>

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
    </div>
  </div>
  @endsection
