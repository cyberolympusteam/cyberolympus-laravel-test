@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Orders') }}</div>
                
                <div class="card-body">
                    <!-- order filters -->
                    <form class="my-4" id="form-filter">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="limit" id="limit" class="form-control" onchange="$('#form-filter').submit()">
                                    <option @if(request()->get('limit') == 10) selected @endif value="10">10</option>
                                    <option @if(request()->get('limit') == 25) selected @endif value="25">25</option>
                                    <option @if(request()->get('limit') == 50) selected @endif value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <input name="search" id="search" type="text" placeholder="Search Order..." class="form-control" value="{{ request()->get('search') }}">
                            </div>
                        </div>
                    </form>

                    <!-- order data -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Agent</th>
                                <th>Items</th>
                                <th>Quantities</th>
                                <th>Buy By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($datas) == 0)
                            <tr>
                                <td colspan="6" class="text-center">No Order Data</td>
                            </tr>
                            @else
                            @foreach($datas as $k => $v)
                            <tr>
                                <td>
                                    <a href="javascript:void(0)">#{{ $v->invoice_id }}</a>
                                </td>
                                <td>{{ $v->name }}</td>
                                <td>
                                    @if($v->agent)
                                    {{ $v->agent->store_name }} ({{ $v->agent_name }})
                                    @else
                                    {{ $v->agent_name }}
                                    @endif
                                </td>
                                <td>{{ number_format($v->items, 0, null, ".") }} product</td>
                                <td>{{ number_format($v->quantities, 0, null, ".") }} item</td>
                                <td>
                                    <span class="badge badge-primary">{{ $v->buy_by }}</span>
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