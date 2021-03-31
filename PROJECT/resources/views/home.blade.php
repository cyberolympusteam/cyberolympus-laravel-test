@extends('layouts.master_page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Category</th>
                        <th scope="col">type</th>
                        <th scope="col">item</th>
                        <th scope="col">weight</th>
                        <th scope="col">sku</th>
                        <th scope="col">price sell</th>
                        <th scope="col">price promo</th>
                        <th scope="col">price agent</th>
                        <th scope="col">photo</th>
                        <th scope="col">recommendation</th>
                        <th scope="col">description</th>
                        <th scope="col">status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $product)
                          <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->type}}</td>
                            <td>{{$product->item}}</td>
                            <td>{{$product->weight}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->price_sell}}</td>
                            <td>{{$product->price_promo}}</td>
                            <td>{{$product->price_agent}}</td>
                            <td>{{$product->photo}}</td>
                            <td>{{$product->recommendation}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                              @if ($product->status == 1)
                                  <a href="">active</a>
                              @else
                                 <a href="">inactive</a> 
                              @endif
                              
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection


