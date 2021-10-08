<div>
    <!-- date filters -->
    <div class="mb-3">
        <form class="row">
            <div class="col-md-4">
                <label for="startDate">Start Date</label>
                <input name="startDate" id="startDate" type="date" value="{{ request()->get('startDate') }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="endDate">End Date</label>
                <input name="endDate" id="endDate" type="date" value="{{ request()->get('endDate') }}" class="form-control">
            </div>
            <div class="col-md-2">
                <label></label>
                <div>
                    <button class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Orders</th>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) == 0)
            <tr>
                <td colspan="3" class="text-center">No Customer Data</td>
            </tr>
            @else
            @foreach($datas as $k => $v)
            <tr>
                <td>#{{ $v->id }}</td>
                <td>{{ $v->first_name }} {{ $v->last_name }}</td>
                <td>{{ $v->orders }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    @if(count($datas) > 0)
    {!! $datas->links() !!}
    @endif

</div>