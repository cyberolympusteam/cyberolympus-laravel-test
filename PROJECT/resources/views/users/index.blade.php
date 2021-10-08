@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>
                
                <div class="card-body">
                    <!-- user options -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            @if(request()->is('users') || request()->is('users/customers'))
                            <a class="nav-link active" href="javascript:void(0)">Customer</a>
                            @else
                            <a class="nav-link" href="{{ url('/users/customers') }}">Customer</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if(request()->is('users/agents'))
                            <a class="nav-link active" href="javascript:void(0)">Agent</a>
                            @else
                            <a class="nav-link" href="{{ url('/users/agents') }}">Agent</a>
                            @endif
                        </li>
                    </ul>
                    
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
                                <input name="search" id="search" type="text" placeholder="Search User..." class="form-control" value="{{ request()->get('search') }}">
                            </div>
                        </div>
                    </form>
                    
                    <div>
                        @if($type == 'customers')
                        @include('users.customers')
                        @else
                        @include('users.agents')
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
