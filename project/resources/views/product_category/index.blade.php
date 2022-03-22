@extends('layouts.app')

@push('style')
      <!-- Custom styles for this page -->
  <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Category Product</h1>

    <p class="mb-4">DataTables Category Product</p>

       <!-- DataTales Example -->
       <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><a href=" {{route('category-product.create')}} ">Tambah</a></h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Parent id</th>
                  <th>Icon</th>
                  <th>Icon Web</th>
                  <th>Status</th>
                  <th>Ordering</th>
                  <th colspan="2">
                    Action
                  </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Parent id</th>
                  <th>Icon</th>
                  <th>Icon Web</th>
                  <th>Status</th>
                  <th>Ordering</th>
                  <th colspan="2">
                    Action
                  </th>
                </tr>
              </tfoot>
                <tbody>
                    @foreach ($productCategory as $pc)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $pc->name}}</td>
                            <td>{{ $pc->parent_id}}</td>
                            <td>
                                <img src="{{ Storage::get($pc->icon)}}" alt="" width="50px" height="50px">
                            </td>
                            <td>{{ $pc->icon_web}}</td>
                            <td>{{ $pc->status}}</td>
                            <td>{{ $pc->ordering}}</td>
                            <td>
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection

@push('script')
      <!-- Page level plugins -->
  <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/assets/js/demo/datatables-demo.js"></script>
@endpush
