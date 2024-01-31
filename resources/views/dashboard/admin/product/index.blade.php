@extends('dashboard.admin.master')

@section('body')
<div class="card pd-20 pd-sm-40 mg-t-50">
    <div class="d-flex justify-content-end pr-3 my-3">
        <button class="btn btn-success btn-md" style="width: 15%">ADD  PRODUCT</button>
    </div>
    <div class="card-header-title d-flex justify-content-between mb-3 pr-3">
    <h6 class="">All  PRODUCT</h6>
    <input type="text"  class="form-control w-25" placeholder="search by  product name">
    </div>
    <div class="table-wrapper">
      <div id="datatable2_wrapper" class="dataTables_wrapper no-footer"><table id="datatable2" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable2_info" style="width: 1546px;">
        <thead>
          <tr role="row"><th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">First name</th><th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-label="Last name: activate to sort column ascending">Last name</th><th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 285px;" aria-label="Position: activate to sort column ascending">Position</th><th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 208px;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="wd-10p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 131px;" aria-label="Salary: activate to sort column ascending">Salary</th><th class="wd-25p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1" style="width: 362px;" aria-label="E-mail: activate to sort column ascending">E-mail</th></tr>
        </thead>
        <tbody>   
        <tr role="row" class="odd">
            <td tabindex="0" class="sorting_1">Airi</td>
            <td>Satou</td>
            <td>Accountant</td>
            <td>2008/11/28</td>
            <td>$162,700</td>
            <td>a.satou@datatables.net</td>
          </tr><tr role="row" class="even">
            <td class="sorting_1" tabindex="0">Angelica</td>
            <td>Ramos</td>
            <td>Chief Executive Officer</td>
            <td>2009/10/09</td>
            <td>$1,200,000</td>
            <td>a.ramos@datatables.net</td>
          </tr>
          <tr role="row" class="odd">
            <td tabindex="0" class="sorting_1">Ashton</td>
            <td>Cox</td>
            <td>Junior Technical Author</td>
            <td>2009/01/12</td>
            <td>$86,000</td>
            <td>a.cox@datatables.net</td>
          </tr>
          <tr role="row" class="even">
            <td class="sorting_1" tabindex="0">Bradley</td>
            <td>Greer</td>
            <td>Software Engineer</td>
            <td>2012/10/13</td>
            <td>$132,000</td>
            <td>b.greer@datatables.net</td>
          </tr>
          <tr role="row" class="odd">
            <td class="sorting_1" tabindex="0">Brenden</td>
            <td>Wagner</td>
            <td>Software Engineer</td>
            <td>2011/06/07</td>
            <td>$206,850</td>
            <td>b.wagner@datatables.net</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
