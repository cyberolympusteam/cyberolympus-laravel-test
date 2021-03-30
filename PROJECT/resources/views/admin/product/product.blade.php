@extends('layouts.admin_layout.admin_layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <table class="table" class="py-4">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Type</th>
                        <th scope="col">Item</th>
                        <th scope="col">Weight</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Price</th>
                        <th scope="col">Promo</th>
                        <th scope="col">Price Agent</th>
                        <th scope="col">Recommedation</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ordering</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                         <tr>
                             <td>{{$product->id}}</td>
                             <td>{{$product->product_name}}</td>
                             <td>{{$product->category}}</td>
                             <td>{{$product->type}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection
