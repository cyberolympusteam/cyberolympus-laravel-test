@extends('layouts.app')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Add Category Product</h1>

    <p class="mb-4">Create Category Product</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('category-product.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
                <div class="label">Name</div>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <div class="label">Parent id</div>
                <input type="number" class="form-control" name="parent_id">
            </div>
            <div class="form-group">
                <div class="label">Icon</div>
                <input type="file" class="form-control" name="icon">
            </div>
            <div class="form-group">
                <div class="label">Icon web</div>
                <input type="url" class="form-control" name="icon_web">
            </div>
            <div class="form-group">
                <div class="label">Status</div>
                <input type="text" class="form-control" name="status" value="1" readonly>
            </div>
            <div class="form-group">
                <div class="label">Ordering</div>
                <input type="number" class="form-control" name="ordering">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
@endsection
