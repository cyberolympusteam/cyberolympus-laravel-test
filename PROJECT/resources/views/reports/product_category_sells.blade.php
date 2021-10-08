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
                <th>Category Name</th>
                <th>Qty</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) == 0)
            <tr>
                <td colspan="3" class="text-center">No Category Data</td>
            </tr>
            @else
            @foreach($datas as $k => $v)
            <tr>
                <td>#{{ $v->id }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->qty }}</td>
                <td>{{ $v->price }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    @if(count($datas) > 0)
    {!! $datas->links() !!}
    @endif

</div>
