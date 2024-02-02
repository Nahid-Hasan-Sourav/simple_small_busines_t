@extends('dashboard.admin.master')

@section('body')
<div>
    @if(session('message'))
    <script>
      Swal.fire({
                title: "FRIEND INFO'S !",
                text: "{{ session('message') }}",
                icon: "success"
            });
    </script>
    @endif

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <div class="d-flex justify-content-end pr-3 my-3">
            <a href="{{ route('friends.create') }}" class="btn btn-success btn-md" style="width: 15%" id="addCustomerBtn">ADD FRIEND</a>
        </div>
        <div class="card-header-title d-flex justify-content-between mb-3 pr-3">
        <h6 class="">All Friends</h6>
        {{-- <input type="text"  class="form-control w-25" id="searchCustomerByName" placeholder="search by customer name"> --}}
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
            <tbody >
                @foreach($allFriends as $friend)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $friend->name }}</td>
                    <td>{{ $friend->email }}</td>
                    <td>{{ $friend->phoneNumber }}</td>
                    <td>{{ $friend->address }}</td>
                    <td>
                        <div class="div">
                        <a href="{{ route('friends.edit',['id'=>$friend->id]) }}"  class="btn btn-sm btn-success editcustomer" >
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <form id="delete-form-{{ $friend->id }}" method="POST"
                        action="{{ route('friends.delete',['id'=>$friend->id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn btn-sm btn-danger"
                          onclick="confirmDelete({{ $friend->id }})">
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

                        </div>
                    </td>
                  </tr>
                @endforeach


            </tbody>
          </table>
        </div>
    </div>
</div>

@endsection
