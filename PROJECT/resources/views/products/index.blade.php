@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>
                
                <div class="card-body">

                    <!-- product filters -->
                    <form class="my-4" id="form-filter">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="category" id="category" class="form-control" onchange="$('#form-filter').submit()">
                                    @foreach($categories as $v)
                                    <option @if(request()->get('category') == $v->id) selected @endif value="{{ $v->id }}">{{ $v->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <input name="search" id="search" type="text" placeholder="Search Product..." class="form-control" value="{{ request()->get('search') }}">
                            </div>
                        </div>
                    </form>

                    <!-- product tables -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Weight</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($datas) == 0)
                            <tr>
                                <td colspan="4" class="text-center">No Product Data</td>
                            </tr>
                            @else
                            @foreach($datas as $k => $v)
                            <tr>
                                <td>
                                    @if($v->sku)
                                    <a href="javascript:void(0)">#{{ $v->sku }}</a>
                                    @else
                                    <a href="javascript:void(0)">#{{ $v->id }}</a>
                                    @endif
                                </td>
                                <td>{{ $v->product_name }}</td>
                                <td>
                                    @if($v->category_name)
                                    <span class="badge badge-success">{{ $v->category_name }}</span>
                                    @endif
                                </td>
                                <td>{{ $v->weight }}</td>
                                <td>
                                    <span class="badge badge-primary">{{ $v->type }}</span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    <!-- pagination -->
                    @if(count($datas) > 0)
                    {!!  $datas->links() !!}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection