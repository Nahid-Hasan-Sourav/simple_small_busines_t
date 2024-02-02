@extends('dashboard.admin.master')

@section('body')
<div>
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <div>
            <h2 class="text-success" id="monthName"></h2>
            <h6>Totall Lends Money =<span id="totalLendsMoney"></span> TK</h6>
            <h6>Totall Received Money =<span id="totallReceivedMoney"></span> TK</h6>

        </div>
        <div class="d-flex justify-content-end pr-3 my-3">
            <button class="btn btn-success btn-md" style="width: 15%" id="addLendsMoneyBtn">LENDS MONEY</button>
        </div>
        <div class="row align-items-center">
            <form class="form-group col-md-4" action="{{ route('buyproduct.index') }}" method="GET" id="searchForm">
              <div class="row">
                <div class="col-6">
                  <label for="status">Select Month</label>
                  <select name="month" class="form-control" id="selectMonth">
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

              </div>
            </form>

          </div>
        <div class="card-header-title d-flex justify-content-between mb-3 pr-3">
        <h6 class="">LENDS MONEY TRACK</h6>
        {{-- <input type="text"  class="form-control w-25" id="searchCustomerByName" placeholder="search by customer name"> --}}
        </div>
        <div class="table-wrapper">
          <div id="datatable2_wrapper" class="dataTables_wrapper no-footer"><table id="datatable2" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable2_info" style="width: 1546px;">
            <thead>
              <tr role="row">
                <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Id</th>
                <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Friend Name</th>
                <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-label="Last name: activate to sort column ascending">Amount</th>
                <th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 285px;" aria-label="Position: activate to sort column ascending">Back Date</th>
                <th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 285px;" aria-label="Position: activate to sort column ascending">STATUS</th>
                <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-label="Start date: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody id="lendsMoneyTableBody">


            </tbody>
          </table>
        </div>
    </div>
    @include('dashboard.admin.lends.modal.addUpdate_modal')
    @include('dashboard.admin.lends.modal.receivedMoney_modal')

</div>

@endsection
