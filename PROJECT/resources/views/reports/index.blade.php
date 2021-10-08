@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reports') }}</div>
                
                <div class="card-body">

                    <!-- reports options -->
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports/statistics') }}">Statistic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports/customer-orders') }}">Customer Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports/agent-orders') }}">Order to Agent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports/profits') }}">Profit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports/item-sells') }}">Item Sell</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports/product-category-sells') }}">Product Category Sell</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports/top-products') }}">Top Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports/top-customers') }}">Top Customer</a>
                        </li>
                    </ul>

                    @if($type == 'statistics')
                    @include('reports.statistics')
                    @elseif($type == 'customer-orders')
                    @include('reports.customer_orders')
                    @elseif($type == 'agent-orders')
                    @include('reports.agent_orders')
                    @elseif($type == 'profits')
                    @include('reports.profits')
                    @elseif($type == 'item-sells')
                    @include('reports.item_sells')
                    @elseif($type == 'product-category-sells')
                    @include('reports.product_category_sells')
                    @elseif($type == 'top-products')
                    @include('reports.top_products')
                    @elseif($type == 'top-customers')
                    @include('reports.top_customers')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection