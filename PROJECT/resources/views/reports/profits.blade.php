<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Agent Name</th>
                <th>Profits</th>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) == 0)
            <tr>
                <td colspan="3" class="text-center">No Agent Data</td>
            </tr>
            @else
            @foreach($datas as $k => $v)
            <tr>
                <td>#{{ $v->id }}</td>
                <td>{{ $v->store_name }}</td>
                <td>{{ $v->profit }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    @if(count($datas) > 0)
    {!! $datas->links() !!}
    @endif

</div>
