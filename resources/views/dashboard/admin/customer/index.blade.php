@extends('dashboard.admin.master')

@section('body')
<div>
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <div class="d-flex justify-content-end pr-3 my-3">
            <button class="btn btn-success btn-md" style="width: 15%" id="addCustomerBtn">ADD CUSTOMER</button>
        </div>
        <div class="card-header-title d-flex justify-content-between mb-3 pr-3">
        <h6 class="">All CUSTOMERS</h6>
        <input type="text"  class="form-control w-25" id="searchCustomerByName" placeholder="search by customer name">
        </div>
        <div class="table-wrapper">
          <div id="datatable2_wrapper" class="dataTables_wrapper no-footer"><table id="datatable2" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable2_info" style="width: 1546px;">
            <thead>
              <tr role="row">
                <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Id</th>
                <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Name</th>
                <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-label="Last name: activate to sort column ascending">Email</th>
                <th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 285px;" aria-label="Position: activate to sort column ascending">Phone Number</th>
                <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-label="Start date: activate to sort column ascending">Address</th>
                <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-label="Start date: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody id="customerTableBody">   
          
             
            </tbody>
          </table>
        </div>
    </div>
</div>
@include('dashboard.admin.customer.modal.addUpdate_modal')

@endsection
